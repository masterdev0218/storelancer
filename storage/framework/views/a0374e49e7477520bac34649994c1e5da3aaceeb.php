<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Cart')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php
        $cart = session()->get($store->slug);
        $imgpath=\App\Models\Utility::get_file('uploads/is_cover_image/');
    ?>
    <?php if(!empty($cart['products']) || $cart['products'] = []): ?>
        <main>
            <section class="my-cart-section">
                <div class="container">
                    <!-- Shopping cart table -->
                    <div class="row">
                        <div class="pr-title mb-4">
                            <h3 class=" mt-4 store-title text-primary"><?php echo e(__('My Cart')); ?></h3>
                            <div class="payment-step">
                                <a href="<?php echo e(route('store.cart',$store->slug)); ?>" class="btn btn-mycart active">1 - <?php echo e(__('My Cart')); ?></a>
                                <a href="<?php echo e(route('user-address.useraddress',$store->slug)); ?>" class="btn btn-mycart">2 - <?php echo e(__('Customer')); ?></a>
                                <a href="<?php echo e(route('store-payment.payment',$store->slug)); ?>" class="btn btn-mycart">3 - <?php echo e(__('Payment')); ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive my-cart">
                        <table class="table table-cards align-items-center">
                            <tbody class="list">
                            <?php if(!empty($products)): ?>
                                <?php
                                    $sub_tax = 0;
                                    $total = 0;
                                ?>
                                <?php $__currentLoopData = $products['products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <?php if($product['variant_id'] != 0 ): ?>
                                        <tr class="alert" data-id="<?php echo e($key); ?>">
                                            <td>
                                                <?php if(!empty($product['image'])): ?>
                                                    <img alt="" src="<?php echo e($imgpath.$product['image']); ?>" class="" style="width:66px;">
                                                <?php else: ?>
                                                    <img alt="" src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>" class="" style="width:66px;">
                                                <?php endif; ?>
                                            </td>
                                            <td scope="row">
                                                <div class="media align-items-center">
                                                    <a href="<?php echo e(route('store.product.product_view',[$store->slug,$product['id']])); ?>" class="text-dark c-list-title mb-0 cart_word_break"><?php echo e($product['product_name'] .' - '. $product['variant_name']); ?></a>
                                                </div>
                                            </td>
                                            <td class="price">
                                                <div class="media-body pl-3">
                                                    <span class="font-weight-bold mb-2 t-gray p-title"><?php echo e(__('Price')); ?></span>
                                                    <div class="lh-100">
                                                    <span class="t-black15 p-price font-weight-bold mb-0">
                                                        <?php echo e(\App\Models\Utility::priceFormat($product['variant_price'])); ?>

                                                    </span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="qty-box">
                                                <span class="font-weight-bold t-gray p-title"><?php echo e(__('Quantity')); ?></span>
                                                <div class="count-input" data-id="<?php echo e($key); ?>">
                                                    <input type="button" value="<" class="qty-minus product_qty">
                                                    <input type="text" value="<?php echo e($product['quantity']); ?>" data-id="<?php echo e($product['product_id']); ?>" class="bx-cart-qty qty form-control form-control-sm text-center product_qty_input" id="product_qty">
                                                    <input type="button" value=">" class="qty-plus product_qty">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="font-weight-bold t-gray p-title"><?php echo e(__('Tax')); ?></div>
                                                <?php
                                                    $total_tax=0;
                                                ?>
                                                <?php if(!empty($product['tax'])): ?>
                                                    <?php $__currentLoopData = $product['tax']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php
                                                            $sub_tax = ($product['variant_price']* $product['quantity'] * $tax['tax']) / 100;
                                                            $total_tax += $sub_tax;
                                                        ?>
                                                        <p class="t-gray p-title mb-0">
                                                            <?php echo e($tax['tax_name'].' '.$tax['tax'].'%'.' ('.$sub_tax.')'); ?>

                                                        </p>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php else: ?>
                                                    -
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <span class="font-weight-bold t-gray p-title"><?php echo e(__('Total')); ?></span>
                                                <?php
                                                    $totalprice = $product['variant_price'] * $product['quantity'] + $total_tax;
                                                    $total += $totalprice;
                                                ?>
                                                <p class="pt-price t-black15">
                                                    <?php echo e(\App\Models\Utility::priceFormat($totalprice)); ?>

                                                </p>
                                            </td>
                                            <td class="text-right">
                                                <!-- Actions -->
                                                <div class="actions ml-3">
                                                    <a href="#!" class="action-item mr-2" data-toggle="tooltip" data-original-title="<?php echo e(__('Move to trash')); ?>" data-confirm="<?php echo e(__('Are You Sure?').' | '.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-product-cart-<?php echo e($key); ?>').submit();">
                                                        <i class="fas fa-times"></i>
                                                    </a>
                                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['delete.cart_item',[$store->slug,$product['product_id'],$product['variant_id']]],'id'=>'delete-product-cart-'.$key]); ?>

                                                    <?php echo Form::close(); ?>

                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="table-divider"></tr>
                                    <?php else: ?>
                                        <tr class="alert" data-id="<?php echo e($key); ?>">
                                            <td>
                                                <?php if(!empty($product['image'])): ?>
                                                    <img alt="Image placeholder" src="<?php echo e($imgpath.$product['image']); ?>" class="" style="width:66px;">
                                                <?php else: ?>
                                                    <img alt="Image placeholder" src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>" class="" style="width:66px;">
                                                <?php endif; ?>
                                            </td>
                                            <td scope="row">
                                                <div class="media align-items-center">
                                                    <a href="<?php echo e(route('store.product.product_view',[$store->slug,$product['id']])); ?>" class="text-dark c-list-title mb-0 cart_word_break"><?php echo e($product['product_name']); ?></a>
                                                </div>
                                            </td>
                                            <td class="price">
                                                <div class="media-body pl-3">
                                                    <span class="font-weight-bold mb-2 t-gray p-title"><?php echo e(__('Price')); ?></span>
                                                    <div class="lh-100">
                                                    <span class="t-black15 p-price font-weight-bold mb-0">
                                                        <?php echo e(\App\Models\Utility::priceFormat($product['price'])); ?>

                                                    </span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="qty-box">
                                                <span class="font-weight-bold t-gray p-title"><?php echo e(__('Quantity')); ?></span>
                                                <div class="count-input" data-id="<?php echo e($key); ?>">
                                                    <input type="button" value="<" class="qty-minus product_qty">
                                                    <input type="text" value="<?php echo e($product['quantity']); ?>" data-id="<?php echo e($product['product_id']); ?>" class="bx-cart-qty qty form-control form-control-sm text-center product_qty_input" id="product_qty">
                                                    <input type="button" value=">" class="qty-plus product_qty">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="font-weight-bold t-gray p-title"><?php echo e(__('Tax')); ?></div>
                                                <?php
                                                    $total_tax=0;
                                                ?>
                                                <?php if(!empty($product['tax'])): ?>
                                                    <?php $__currentLoopData = $product['tax']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php
                                                            $sub_tax = ($product['price']* $product['quantity'] * $tax['tax']) / 100;
                                                            $total_tax += $sub_tax;
                                                        ?>
                                                        <p class="t-gray p-title mb-0">
                                                            <?php echo e($tax['tax_name'].' '.$tax['tax'].'%'.' ('.$sub_tax.')'); ?>

                                                        </p>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php else: ?>
                                                    -
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <span class="font-weight-bold t-gray p-title"><?php echo e(__('Total')); ?></span>
                                                <?php
                                                    $totalprice = $product['price'] * $product['quantity'] + $total_tax;
                                                    $total += $totalprice;
                                                ?>
                                                <p class="pt-price t-black15">
                                                    <?php echo e(\App\Models\Utility::priceFormat($totalprice)); ?>

                                                </p>
                                            </td>
                                            <td class="text-right ml-3">
                                                <!-- Actions -->
                                                <div class="actions ml-3">
                                                    <a href="#!" class="action-item mr-2" data-toggle="tooltip" data-original-title="<?php echo e(__('Move to trash')); ?>" data-confirm="<?php echo e(__('Are You Sure?').' | '.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-product-cart-<?php echo e($key); ?>').submit();">
                                                        <i class="fas fa-times"></i>
                                                    </a>
                                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['delete.cart_item',[$store->slug,$product['product_id'],$product['variant_id']]],'id'=>'delete-product-cart-'.$key]); ?>

                                                    <?php echo Form::close(); ?>

                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="table-divider"></tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Cart information -->
                    <div class="card mt-2 bg-primary">
                        <div class="card-body">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-md-6 order-md-2 mb-4 mb-md-0">
                                    <div class="d-flex align-items-center justify-content-md-end">
                                        <span class="h6 text-white d-inline-block mr-3 mb-0"><?php echo e(__('Total value')); ?>:</span>
                                        <span class="h4 mb-0 cart-total text-white">
                                             <?php echo e(\App\Models\Utility::priceFormat(!empty($total)?$total:0)); ?>

                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6 order-md-1">
                                    <?php if($store_settings['is_checkout_login_required'] == null || $store_settings['is_checkout_login_required'] == 'off' && !Auth::guard('customers')->user()): ?>
                                        <a href="#" class="btn btn-white btn-white btn-icon rounded-pill hover-translate-y-n3" data-toggle="modal" data-target="#checkoutModal">
                                            <span class="btn-inner--text text-primary"><?php echo e(__('Proceed to checkout')); ?></span>
                                            <i class="fas fa-shopping-basket"></i>
                                        </a>
                                    <?php else: ?>
                                        <a href="<?php echo e(route('user-address.useraddress',$store->slug)); ?>" class="btn btn-white btn-white btn-icon rounded-pill hover-translate-y-n3">
                                            <span class="btn-inner--text text-primary"><?php echo e(__('Proceed to checkout')); ?></span>
                                            <i class="fas fa-shopping-basket"></i>
                                        </a>
                                    <?php endif; ?>
                                    <a href="<?php echo e(route('store.slug',$store->slug)); ?>" class="btn return-shop text-white"><?php echo e(__('Return to shop')); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    <?php else: ?>
        <div class="main-content">
            <section class="mh-100vh d-flex align-items-center" data-offset-top="#header-main">
                <!-- SVG background -->
                <div class="bg-absolute-cover bg-size--contain d-flex align-items-center zindex0">
                    <figure class="w-100 px-4">
                        <img alt="Image placeholder" src="<?php echo e(asset('assets/img/bg-3.svg')); ?>" class="svg-inject">
                    </figure>
                </div>
                <div class="container pt-6 position-relative">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="text-center">
                                <!-- SVG illustration -->
                                <div class="row justify-content-center mb-5">
                                    <div class="col-md-5">
                                        <img alt="Image placeholder" src="<?php echo e(asset('assets/img/online-shopping.svg')); ?>" class="svg-inject img-fluid">
                                    </div>
                                </div>
                                <!-- Empty cart container -->
                                <h6 class="h4 my-4"><?php echo e(__('Your cart is empty')); ?>.</h6>
                                <p class="px-md-5">
                                    <?php echo e(__('Your cart is currently empty. Return to our shop and check out the latest offers.
                                    We have some great items that are waiting for you')); ?>.
                                </p>
                                <a href="<?php echo e(route('store.slug',$store->slug)); ?>" class="btn btn-sm btn-primary btn-icon rounded-pill my-5">
                                    <span class="btn-inner--icon"><i class="fas fa-angle-left"></i></span>
                                    <span class="btn-inner--text"><?php echo e(__('Return to shop')); ?></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>


<div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="checkoutModal" aria-hidden="true">
    <div class="modal-dialog modal-md rounded-pill " >
      <div class="modal-content ">
        <div class="modal-header">
            <h5 class="modal-title">Checkout As Guest Or Login</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body row">
            <div class="form-group col-6 d-flex justify-content-center col-form-label mb-0">
                <a href="<?php echo e(route('customer.login',$store->slug)); ?>" class="btn btn-secondary btn-light rounded-pill"><?php echo e(__('Countinue to sign in')); ?></a>
            </div>
            <div class="form-group col-6 d-flex justify-content-center col-form-label mb-0">
                <a href="<?php echo e(route('user-address.useraddress',$store->slug)); ?>" class="btn btn-primary ms-2 rounded-pill"><?php echo e(__('Countinue as guest')); ?></a>
            </div>
        </div>
      </div>
    </div>
  </div>

<?php $__env->startPush('script-page'); ?>
    <script>
        $(document).on('click', '.product_qty', function (e) {
            e.preventDefault();
            var currEle = $(this);
            var product_id = $(this).siblings(".bx-cart-qty").attr('data-id');
            var arrkey = $(this).parents('tr').attr('data-id');

            setTimeout(function () {
                if (currEle.hasClass('qty-minus') == true) {
                    qty_id = currEle.next().val()
                } else {
                    qty_id = currEle.prev().val()
                }

                if (qty_id == 0 || qty_id == '' || qty_id < 0) {
                    location.reload();
                    return false;
                }

                $.ajax({
                    url: '<?php echo e(route('user-product_qty.product_qty',['__product_id',$store->slug,'arrkeys'])); ?>'.replace('__product_id', product_id).replace('arrkeys', arrkey),
                    type: "post",
                    headers: {
                        'x-csrf-token': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        "product_qty": qty_id,
                    },
                    success: function (response) {
                        if (response.status == "Error") {
                            show_toastr('Error', response.error, 'error');
                            setTimeout(function () {
                                location.reload();
                            }, 1000);
                        } else {
                            location.reload(); // then reload the page.(3)
                        }
                    },
                    error: function (result) {
                        console.log('error12');
                    }
                });
            }, 100);
        })

        $(".product_qty_input").on('blur', function (e) {
            e.preventDefault();

            var product_id = $(this).attr('data-id');
            var arrkey = $(this).parents('div').attr('data-id');
            var qty_id = $(this).val();
            console.log(product_id, arrkey, qty_id);

            setTimeout(function () {
                if (qty_id == 0 || qty_id == '' || qty_id < 0) {
                    location.reload();
                    return false;
                }

                $.ajax({
                    url: '<?php echo e(route('user-product_qty.product_qty',['__product_id',$store->slug,'arrkeys'])); ?>'.replace('__product_id', product_id).replace('arrkeys', arrkey),
                    type: "post",
                    headers: {
                        'x-csrf-token': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        "product_qty": qty_id,
                    },
                    success: function (response) {
                        if (response.status == "Error") {
                            show_toastr('Error', response.error, 'error');
                            setTimeout(function () {
                                location.reload();
                            }, 1000);
                        } else {
                            location.reload(); // then reload the page.(3)
                        }
                    },
                    error: function (result) {
                        // console.log('error12');
                    }
                });
            }, 500);
        });

        function qtyChange(product_id, arrkey, qty_id) {

        }

        $(document).on('click', '.qty-plus', function () {
            $(this).prev().val(+$(this).prev().val() + 1);
        });

        $(document).on('click', '.qty-minus', function () {
            if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.theme1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/storelancer/resources/views/storefront/theme1/cart.blade.php ENDPATH**/ ?>