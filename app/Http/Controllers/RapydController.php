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

        dd($response);

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
            } catch (\Exception $e) {
                return redirect()->back()->with('error', __('Unknown error occurred'));
            }
        } else {
            return redirect()->back()->with('error', __('is deleted.'));
        }
    }
}
