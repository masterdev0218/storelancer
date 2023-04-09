<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\PurchasedProducts;
use App\Models\Shipping;
use App\Models\Store;
use App\Models\User;
use App\Models\Utility;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\ProductVariantOption;

class RapydController extends Controller
{
    private function rapyd_generate_string($length = 12)
    {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle($permitted_chars), 0, $length);
    }


    // make_request method - Includes the logic to communicate with the Rapyd sandbox server.
    private function rapyd_make_request($method, $path, $body = null)
    {
        $base_url = config('rapyd.api_url');
        $access_key = config('rapyd.access_key');     // The access key received from Rapyd.
        $secret_key = config('rapyd.secret_key'); // Never transmit the secret key by itself.

        $idempotency = $this->rapyd_generate_string();      // Unique for each request.
        $http_method = $method;                // Lower case.
        $salt = $this->rapyd_generate_string();             // Randomly generated for each request.
        $date = new DateTime();
        $timestamp = $date->getTimestamp();    // Current Unix time.

        $body_string = !is_null($body) ? json_encode($body, JSON_UNESCAPED_SLASHES) : '';
        $sig_string = "$http_method$path$salt$timestamp$access_key$secret_key$body_string";


        $hash_sig_string = hash_hmac("sha256", $sig_string, $secret_key);
        $signature = base64_encode($hash_sig_string);

        $request_data = NULL;

        if ($method === 'post') {
            $request_data = array(
                CURLOPT_URL => "$base_url$path",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $body_string

            );
        } else {
            $request_data = array(
                CURLOPT_URL => "$base_url$path",
                CURLOPT_RETURNTRANSFER => true,
            );
        }

        $curl = curl_init();
        curl_setopt_array($curl, $request_data);

        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
            "access_key: $access_key",
            "salt: $salt",
            "timestamp: $timestamp",
            "signature: $signature",
            "idempotency: $idempotency"
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            throw new Exception("cURL Error #:" . $err);
        } else {
            return json_decode($response, true);
        }
    }

    public function pay(Request $request, $slug)
    {
        $cart = session()->get($slug);
        $products = $cart['products'];

        $store = Store::where('slug', $slug)->first();

        $admin_payments_details = Utility::getPaymentSetting($store->id);

        $objUser = Auth::user();

        $total_tax = $sub_total = $total = $sub_tax = 0;
        $product_name = [];
        $product_id = [];

        foreach ($products as $key => $product) {
            if ($product['variant_id'] != 0) {

                $product_name[] = $product['product_name'];
                $product_id[] = $key;

                foreach ($product['tax'] as $tax) {
                    $sub_tax = ($product['variant_price'] * $product['quantity'] * $tax['tax']) / 100;
                    $total_tax += $sub_tax;
                }
                $totalprice = $product['variant_price'] * $product['quantity'];
                $total += $totalprice;
            } else {
                $product_name[] = $product['product_name'];
                $product_id[] = $key;

                foreach ($product['tax'] as $tax) {
                    $sub_tax = ($product['price'] * $product['quantity'] * $tax['tax']) / 100;
                    $total_tax += $sub_tax;
                }
                $totalprice = $product['price'] * $product['quantity'];
                $total += $totalprice;
            }
        }


        // $this->paymentconfig();
        if ($products) {
            try {
                $coupon_id = null;
                $price = $total + $total_tax;
                if (isset($cart['coupon'])) {
                    if ($cart['coupon']['coupon']['enable_flat'] == 'off') {
                        $discount_value = ($price / 100) * $cart['coupon']['coupon']['discount'];
                        $price = $price - $discount_value;
                    } else {
                        $discount_value = $cart['coupon']['coupon']['flat_discount'];
                        $price = $price - $discount_value;
                    }
                }

                if (isset($cart['shipping']) && isset($cart['shipping']['shipping_id']) && !empty($cart['shipping'])) {
                    $shipping = Shipping::find($cart['shipping']['shipping_id']);
                    if (!empty($shipping)) {
                        $price = $price + $shipping->price;
                    }
                }

                $country = "US";
                $language = "en";
                $successURL = route('get.rapyd.payment.status', $store->slug);
                $cancelURL = route('get.rapyd.payment.status', $store->slug);

                $body = [
                    "amount" => (int)$price,
                    "complete_checkout_url" => $successURL,
                    "country" => $country,
                    "currency" => 'USD',
                    "cancel_checkout_url" => $cancelURL,
                    "language" => $language,
                ];

                try {
                    $object = $this->rapyd_make_request('post', '/v1/checkout', $body);

                    $redirect_url = $object["data"]["redirect_url"];

                    echo "<script>window.location.href='" . $redirect_url . "';</script>";
                    exit;
                } catch (Exception $e) {
                    echo "Error =>$e";
                }
            } catch (\Exception $e) {
                return redirect()->back()->with('error', __('Unknown error occurred'));
            }
        } else {
            return redirect()->back()->with('error', __('is deleted.'));
        }
    }

    function GetPaymentStatus(Request $request, $slug)
    {
        $store = Store::where('slug', $slug)->first();
        $admin_payments_details = Utility::getPaymentSetting($store->id);

        $cart = session()->get($slug);
        if (isset($cart['coupon'])) {
            $coupon = $cart['coupon']['coupon'];
        }
        if (isset($cart) && !empty($cart['products'])) {
            $products = $cart['products'];
        } else {
            return redirect()->back()->with('error', __('Please add to product into cart'));
        }
        $user_details = $cart['customer'];

        $total = 0;
        $new_qty = 0;
        $sub_total = 0;
        $total_tax = 0;
        $product_name = [];
        $product_id = [];
        $quantity = [];
        $pro_tax = [];
        $sub_tax = 0;
        foreach ($products as $key => $product) {
            if ($product['variant_id'] != 0) {
                $new_qty = $product['originalvariantquantity'] - $product['quantity'];
                $product_edit = ProductVariantOption::find($product['variant_id']);
                $product_edit->quantity = $new_qty;
                $product_edit->save();

                $product_name[] = $product['product_name'];
                $product_id[] = $key;
                $quantity[] = $product['quantity'];

                foreach ($product['tax'] as $tax) {
                    $sub_tax = ($product['variant_price'] * $product['quantity'] * $tax['tax']) / 100;
                    $total_tax += $sub_tax;
                    $pro_tax[] = $sub_tax;
                }
                $totalprice = $product['variant_price'] * $product['quantity'];
                $subtotal = $product['variant_price'] * $product['quantity'];
                $sub_total += $subtotal;
                $total += $totalprice;
            } else {
                $new_qty = $product['originalquantity'] - $product['quantity'];
                $product_edit = Product::find($product['product_id']);
                $product_edit->quantity = $new_qty;
                $product_edit->save();

                $product_name[] = $product['product_name'];
                $product_id[] = $key;
                $quantity[] = $product['quantity'];

                foreach ($product['tax'] as $tax) {
                    $sub_tax = ($product['price'] * $product['quantity'] * $tax['tax']) / 100;
                    $total_tax += $sub_tax;
                    $pro_tax[] = $sub_tax;
                }
                $totalprice = $product['price'] * $product['quantity'];
                $subtotal = $product['price'] * $product['quantity'];
                $sub_total += $subtotal;
                $total += $totalprice;
            }
        }
        $price = $totalprice + $sub_tax;
        if (isset($cart['coupon'])) {
            if ($cart['coupon']['coupon']['enable_flat'] == 'off') {
                $discount_value = ($price / 100) * $cart['coupon']['coupon']['discount'];
                $price = $price - $discount_value;
            } else {
                $discount_value = $cart['coupon']['coupon']['flat_discount'];
                $price = $price - $discount_value;
            }
        }
        if (isset($cart['shipping']) && isset($cart['shipping']['shipping_id']) && !empty($cart['shipping'])) {
            $shipping = Shipping::find($cart['shipping']['shipping_id']);
            if (!empty($shipping)) {
                $shipping_name = $shipping->name;
                $shipping_price = $shipping->price;

                $shipping_data = json_encode(
                    [
                        'shipping_name' => $shipping_name,
                        'shipping_price' => $shipping_price,
                        'location_id' => $cart['shipping']['location_id'],
                    ]
                );
            } else {
                $shipping_data = '';
            }
        }
        $user = Auth::user();

        if ($product) {
                $country = "US";
                $language = "en";
                $successURL = route('get.payment.status', $store->slug);
                $cancelURL = route('get.payment.status', $store->slug);

                $body = [
                    "amount" => (int)$price,
                    "complete_checkout_url" => $successURL,
                    "country" => $country,
                    "currency" => 'USD',
                    "cancel_checkout_url" => $cancelURL,
                    "language" => $language,
                ];

                try {
                    $object = $this->rapyd_make_request('post', '/v1/checkout', $body);

                    $redirect_url = $object["data"]["redirect_url"];

                    echo "<script>window.location.href='" . $redirect_url . "';</script>";
                    exit;
                } catch (Exception $e) {
                    echo "Error =>$e";
                }

            $payment_id = Session::get('rapyd_payment_id');

            $order_id = strtoupper(str_replace('.', '', uniqid('', true)));

            // $this->setApiContext($slug);
            // $payment_id = Session::get('paypal_payment_id');
            // Session::forget('paypal_payment_id');
            // if(empty($request->PayerID || empty($request->token)))
            // {
            //     return redirect()->route('store-payment.payment', $slug)->with('error', __('Payment failed'));
            // }
            // $payment   = Payment::get($payment_id, $this->_api_context);
            // $execution = new PaymentExecution();
            // $execution->setPayerId($request->PayerID);
            try {
                $order = new Order();
                $order->user_id = Auth()->id();
                $latestOrder = Order::orderBy('created_at', 'DESC')->first();
                if (!empty($latestOrder)) {
                    $order->order_nr = '#' . str_pad($latestOrder->id + 1, 4, "100", STR_PAD_LEFT);
                } else {
                    $order->order_nr = '#' . str_pad(1, 4, "100", STR_PAD_LEFT);
                }
                $orderID = $order->order_nr;
                $statuses = '';
                if (isset($response['status']) && $response['status'] == 'SUCCESS') {

                    if ($response['status'] == 'SUCCESS') {

                        $statuses = 'success';
                    }

                    // dd($response,$provider, $total);
                    // $status = ucwords(str_replace('_', ' ', $result['state']));

                    if (Utility::CustomerAuthCheck($store->slug)) {
                        $customer = Auth::guard('customers')->user()->id;
                    } else {
                        $customer = 0;
                    }

                    $customer = Auth::guard('customers')->user();
                    $order = new Order();
                    $order->order_id = $orderID;
                    $order->name = $user_details['name'];
                    $order->email = $user_details['email'];
                    $order->card_number = '';
                    $order->card_exp_month = '';
                    $order->card_exp_year = '';
                    $order->status = 'pending';
                    $order->user_address_id = $user_details['id'];
                    $order->shipping_data = !empty($shipping_data) ? $shipping_data : '';
                    $order->coupon = $price;
                    $order->coupon_json = json_encode(!empty($coupon) ? $coupon : '');
                    $order->discount_price = !empty($cart['coupon']['discount_price']) ? $cart['coupon']['discount_price'] : '';
                    $order->price = $total;
                    $order->product = json_encode($products);
                    $order->price_currency = $store->currency_code;
                    $order->txn_id = $payment_id;
                    $order->payment_type = __('PAYPAL');
                    $order->payment_status = $statuses;
                    $order->receipt = '';
                    $order->user_id = $store['id'];
                    $order->customer_id = isset($customer->id) ? $customer->id : '';


                    $order->save();


                    if ((!empty(Auth::guard('customers')->user()) && $store->is_checkout_login_required == 'on')) {
                        foreach ($products as $product_id) {
                            $purchased_products = new PurchasedProducts();
                            $purchased_products->product_id = $product_id['product_id'];
                            $purchased_products->customer_id = $customer->id;
                            $purchased_products->order_id = $order->id;
                            $purchased_products->save();
                        }
                    }
                    session()->forget($slug);

                    $order_email = $order->email;

                    $owner = User::find($store->created_by);

                    $owner_email = $owner->email;

                    $order_id = Crypt::encrypt($order->id);
                    if (isset($store->mail_driver) && !empty($store->mail_driver)) {
                        $dArr = [
                            'order_name' => $order->name,
                        ];
                        $resp = Utility::sendEmailTemplate('Order Created', $order_email, $dArr, $store, $order_id);

                        $resp1 = Utility::sendEmailTemplate('Order Created For Owner', $owner_email, $dArr, $store, $order_id);
                    }
                    if (isset($store->is_twilio_enabled) && $store->is_twilio_enabled == "on") {
                        Utility::order_create_owner($order, $owner, $store);
                        Utility::order_create_customer($order, $customer, $store);
                    }

                    return redirect()->route(
                        'store-complete.complete',
                        [
                            $store->slug,
                            Crypt::encrypt($order->id),
                        ]
                    )->with('success', __('Transaction has been') . $statuses);
                } else {
                    return redirect()->back()->with('error', __('Transaction has been') . $statuses);
                }
            } catch (\Exception $e) {
                // dd($e);
                return redirect()->back()->with('error', __('Transaction has been failed.'));
            }
        } else {
            return redirect()->back()->with('error', __(' is deleted.'));
        }
    }
}
