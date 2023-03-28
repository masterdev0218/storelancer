<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Product Details')); ?>

<?php $__env->stopSection(); ?>
<?php
$imgpath=\App\Models\Utility::get_file('uploads/product_image/');
$proimg=\App\Models\Utility::get_file('uploads/is_cover_image/');

?>
<?php $__env->startSection('content'); ?>
    <!-- Product Details -->
    <section class="product-section pt-3">
        <div class="container">
            <div class="row row-grid">
                <div class="breadcrumb-section">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('store.slug', $store->slug)); ?>"><?php echo e(__('Main site')); ?></a>
                        </li>
                        <li class="breadcrumb-item active m-0" aria-current="page"><?php echo e($products->name); ?></li>
                    </ul>
                </div>
            </div>
            <div class="row row-grid">
                <div class="col-lg-6">
                    <div class="container product-slider">
                        <div class="carousel-container position-relative row ">
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <?php $__currentLoopData = $products_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $productss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="carousel-item <?php echo e($key == 0 ? 'active' : ''); ?>"
                                            data-slide-number="<?php echo e($key); ?>">
                                            <?php if(!empty($products_image[$key]->product_images)): ?>
                                                <img src="<?php echo e($imgpath. $products_image[$key]->product_images); ?>"
                                                    class="d-block w-100" alt="..."
                                                    data-remote="<?php echo e($imgpath. $products_image[$key]->product_images); ?>"
                                                    data-type="image" data-toggle="lightbox" data-gallery="example-gallery">
                                            <?php else: ?>
                                                <img src="<?php echo e(asset(Storage::url('uploads/product_image/default.jpg'))); ?>"
                                                    class="d-block w-100" alt="..."
                                                    data-remote="<?php echo e($imgpath. $products_image[$key]->product_images); ?>"
                                                    data-type="image" data-toggle="lightbox" data-gallery="example-gallery">
                                            <?php endif; ?>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>

                            <!-- Carousel Navigation -->
                            <div id="carousel-thumbs" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="row mx-0">
                                            <?php $__currentLoopData = $products_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $productss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div id="carousel-selector-<?php echo e($key); ?>"
                                                    class="thumb col-lg-4 col-sm-4 col-4 px-1 py-2 "
                                                    data-target="#myCarousel" data-slide-to="<?php echo e($key); ?>">
                                                    <?php if(!empty($products_image[$key]->product_images)): ?>
                                                        <img src="<?php echo e($imgpath. $products_image[$key]->product_images); ?>"
                                                            class="img-fluid" alt="...">
                                                    <?php else: ?>
                                                        <img src="<?php echo e(asset(Storage::url('uploads/product_image/default.jpg'))); ?>"
                                                            class="img-fluid" alt="...">
                                                    <?php endif; ?>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carousel-thumbs" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carousel-thumbs" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>

                        </div>
                        <!-- /row -->
                    </div>
                    <!-- /container -->

                    <div class="customer-product-review">
                        <div class="review-title">
                            <h5>
                                <span class="r-title"><?php echo e(__('Reviews')); ?>:</span>
                                <span class="r-rate"><?php echo e($avg_rating); ?>/5</span>
                                <span class="t-gray"> (<?php echo e(__('reviews')); ?>)</span>
                            </h5>
                            <div class="p-rateing  d-flex">
                                <span class="static-rating static-rating-sm d-block mr-2 padtop">
                                    <?php if($store_setting->enable_rating == 'on'): ?>
                                        <?php for($i = 1; $i <= 5; $i++): ?>
                                            <?php
                                                $icon = 'fa-star';
                                                $color = '';
                                                $newVal1 = $i - 0.5;
                                                if ($avg_rating < $i && $avg_rating >= $newVal1) {
                                                    $icon = 'fa-star-half-alt';
                                                }
                                                if ($avg_rating >= $newVal1) {
                                                    $color = 'text-primary';
                                                }
                                            ?>
                                            <i class="star fas <?php echo e($icon . ' ' . $color); ?>"></i>
                                        <?php endfor; ?>
                                    <?php endif; ?>
                                </span>
                                <?php if(Auth::guard('customers')->check()): ?>
                                    <a href="#"
                                        class="btn btn-sm btn-primary btn-icon-only rounded-circle float-right text-white"
                                        data-size="lg" data-toggle="modal"
                                        data-url="<?php echo e(route('rating', [$store->slug, $products->id])); ?>"
                                        data-ajax-popup="true" data-title="<?php echo e(__('Create New Rating')); ?>">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php $__currentLoopData = $product_ratings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_key => $product_rating): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($product_rating->rating_view == 'on'): ?>
                            <hr>
                            <div class="customer-product-review">
                                <div class="pd-rate">
                                    <div class="p-rateing  d-flex">
                                        <span class="static-rating static-rating-sm d-block">
                                            <?php for($i = 0; $i < 5; $i++): ?>
                                                <i
                                                    class="star fas fa-star <?php echo e($product_rating->ratting > $i ? 'text-primary' : ''); ?>"></i>
                                            <?php endfor; ?>
                                        </span>
                                        <p class="mb-0 ml-3">
                                            <span class="t-gray">
                                                <?php echo e($avg_rating); ?>/5 (<?php echo e($user_count); ?> <?php echo e(__('reviews')); ?>)
                                            </span>
                                        </p>
                                    </div>
                                </div>
                                <!-- Product title -->
                                <p class="text-sm mb-0 mt-2 product-detail"><?php echo e($product_rating->description); ?></p>
                                <div class="mt-2">
                                    <p class="mb-0 t-black13"><?php echo e($product_rating->name); ?> :</p>
                                    <span><?php echo e($product_rating->title); ?></span>
                                </div>
                            </div>
                            <hr>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="col-lg-6">
                    <div class="pd-rate">
                        <div class="p-rateing  d-flex">
                            <?php if($store_setting->enable_rating == 'on'): ?>
                                <span class="static-rating static-rating-sm d-block">
                                    <?php for($i = 1; $i <= 5; $i++): ?>
                                        <?php
                                            $icon = 'fa-star';
                                            $color = '';
                                            $newVal1 = $i - 0.5;
                                            if ($avg_rating < $i && $avg_rating >= $newVal1) {
                                                $icon = 'fa-star-half-alt';
                                            }
                                            if ($avg_rating >= $newVal1) {
                                                $color = 'text-primary';
                                            }
                                        ?>
                                        <i class="star fas <?php echo e($icon . ' ' . $color); ?>"></i>
                                    <?php endfor; ?>
                                </span>
                                <p class="mb-0 ml-3"><span class="t-gray"><?php echo e($avg_rating); ?>/5 (<?php echo e($user_count); ?>

                                        <?php echo e(__('reviews')); ?>) </span></p>
                            <?php endif; ?>
                        </div>
                        <div class="p-rate">
                            <?php if(Auth::guard('customers')->check()): ?>
                                <?php if(!empty($wishlist) && isset($wishlist[$products->id]['product_id'])): ?>
                                    <?php if($wishlist[$products->id]['product_id'] != $products->id): ?>
                                        <button type="button"
                                            class="action-item wishlist-icon add_to_wishlist wishlist_<?php echo e($products->id); ?>"
                                            data-id="<?php echo e($products->id); ?>">
                                            <i class="far fa-heart"></i>
                                        </button>
                                    <?php else: ?>
                                        <button type="button" class="action-item wishlist-icon"
                                            data-id="<?php echo e($products->id); ?>" disabled>
                                            <i class="fas fa-heart"></i>
                                        </button>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <button type="button"
                                        class="action-item wishlist-icon add_to_wishlist wishlist_<?php echo e($products->id); ?>"
                                        data-id="<?php echo e($products->id); ?>">
                                        <i class="far fa-heart"></i>
                                    </button>
                                <?php endif; ?>
                            <?php else: ?>
                                <button type="button"
                                    class="action-item wishlist-icon add_to_wishlist wishlist_<?php echo e($products->id); ?>"
                                    data-id="<?php echo e($products->id); ?>">
                                    <i class="far fa-heart"></i>
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- Product title -->
                    <h5 class="h4 store-title"><?php echo e($products->name); ?></h5>
                    <p class="text-sm mb-0 product-detail"><?php echo $products->detail; ?></p>

                    <?php if($products->enable_product_variant == 'on'): ?>
                        <input type="hidden" id="product_id" value="<?php echo e($products->id); ?>">
                        <input type="hidden" id="variant_id" value="">
                        <input type="hidden" id="variant_qty" value="">
                        <div class="p-color mt-3">
                            <p class="mb-0"><?php echo e(__('VARIATION:')); ?></p>

                            <?php $__currentLoopData = $product_variant_names; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-sm-6 mb-4 mb-sm-0">
                                    <p class="d-block h6 mb-0">
                                    <p class="mb-0 variant_name"><?php echo e(empty($variant->variant_name) ? $variant['variant_name'] :  $variant->variant_name); ?></p>

                                    <select name="product[<?php echo e($key); ?>]"  id="pro_variants_name"
                                        class="form-control custom-select variant-selection  pro_variants_name<?php echo e($key); ?> pro_variants_name variant_loop variant_val">
                                        
                                        <?php $__currentLoopData = $variant->variant_options ?? $variant['variant_options']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($values); ?>" id="<?php echo e($values); ?>_varient_option"><?php echo e($values); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    </span>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>

                    <div class="product-price">
                        <span class="h3 mb-0 p-price variation_price">
                            <?php if($products->enable_product_variant == 'on'): ?>
                                <?php echo e(\App\Models\Utility::priceFormat(0)); ?>

                            <?php else: ?>
                                <?php echo e(\App\Models\Utility::priceFormat($products->price)); ?>

                            <?php endif; ?>
                        </span>
                        <sup class="h3 mb-0 sub-price"><?php echo e(\App\Models\Utility::priceFormat($products->last_price)); ?></sup>
                    </div>
                    <span class=" mb-0 text-danger product-price-error"></span>
                    <div class="cart-buttons">
                        <a href="#"
                            class="btn btn-primary rounded-pill btn-icon shadow hover-shadow-lg hover-translate-y-n3 add_to_cart"
                            data-id="<?php echo e($products->id); ?>" id="cart-btn">
                            <span class="btn-inner--text"><?php echo e(__('Add to cart')); ?></span>
                            <span class="btn-inner--icon">
                                <i class="fas fa-shopping-basket"></i>
                            </span>
                        </a>
                        <p class="mb-0 t-black14"><span class="t-gray"><?php echo e(__('Category')); ?>:</span>
                            <?php echo e($products->product_category()); ?></p>
                        <p class="mb-0 t-black14"><span class="t-gray"><?php echo e(__('ID')); ?>:</span> <?php echo e($products->SKU); ?>

                        </p>
                    </div>
                    <?php if(!empty($products->custom_field_1) && !empty($products->custom_value_1)): ?>
                        <div class="cart-buttons">
                            <div class="mb-0 t-black14"><span class="t-gray"><?php echo e($products->custom_field_1); ?> : </span>
                                <?php echo e($products->custom_value_1); ?></div>
                        </div>
                    <?php endif; ?>
                    <?php if(!empty($products->custom_field_2) && !empty($products->custom_value_2)): ?>
                        <div class="cart-buttons">
                            <div class="mb-0 t-black14"><span class="t-gray"><?php echo e($products->custom_field_2); ?> : </span>
                                <?php echo e($products->custom_value_2); ?></div>
                        </div>
                    <?php endif; ?>
                    <?php if(!empty($products->custom_field_3) && !empty($products->custom_value_3)): ?>
                        <div class="cart-buttons">
                            <div class="mb-0 t-black14"><span class="t-gray"><?php echo e($products->custom_field_3); ?> : </span>
                                <?php echo e($products->custom_value_3); ?></div>
                        </div>
                    <?php endif; ?>
                    <?php if(!empty($products->custom_field_4) && !empty($products->custom_value_4)): ?>
                        <div class="cart-buttons">
                            <div class="mb-0 t-black14"><span class="t-gray"><?php echo e($products->custom_field_4); ?> : </span>
                                <?php echo e($products->custom_value_4); ?></div>
                        </div>
                    <?php endif; ?>
                    <div class="store-tabs" id="accordion" role="tablist">
                        <?php if(!empty($products->description)): ?>
                            <div class="card">
                                <div class="card-header" role="tab" id="headingOne">
                                    <h5 class="mb-0">
                                        <a data-toggle="collapse" href="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            <?php echo e(__('DESCRIPTION')); ?>

                                        </a>
                                    </h5>
                                </div>
                                <div id="collapseOne" class="collapse show" role="tabpanel"
                                    aria-labelledby="headingOne">
                                    <div class="card-body">
                                        <?php echo $products->description; ?>

                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if(!empty($products->specification)): ?>
                            <div class="card">
                                <div class="card-header" role="tab" id="headingTwo">
                                    <h5 class="mb-0">
                                        <a class="collapsed" data-toggle="collapse" href="#collapseTwo"
                                            aria-expanded="false" aria-controls="collapseTwo">
                                            <?php echo e(__('SPECIFICATION')); ?>

                                        </a>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="card-body">
                                        <?php echo $products->specification; ?>

                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if(!empty($products->detail)): ?>
                            <div class="card">
                                <div class="card-header" role="tab" id="headingThree">
                                    <h5 class="mb-0">
                                        <a class="collapsed" data-toggle="collapse" href="#collapseThree"
                                            aria-expanded="false" aria-controls="collapseThree">
                                            <?php echo e(__('DETAILS')); ?>

                                        </a>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                                    <div class="card-body">
                                        <?php echo $products->detail; ?>

                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if(!empty($products->attachment)): ?>
                        <div class="button">
                            <a href="<?php echo e(asset(Storage::url('uploads/is_cover_image/' . $products->attachment))); ?>"
                                class="text-primary btn-instruction" download="<?php echo e($products->attachment); ?>">
                                <span class="btn-inner--icon">
                                    <i class="fas fa-shopping-basket"></i>
                                </span>
                                <?php echo e(__('Download instruction .pdf')); ?>

                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Products -->

    <section class="top-product">
        <div class="container">
            <div class="row">
                <div class="pr-title">
                    <h3 class=" mt-4 store-title-medium text-primary"><?php echo e(__('Related products')); ?></h3>
                </div>
            </div>
            <div class="row">
                <?php $__currentLoopData = $all_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($product->id != $products->id): ?>
                        <div class="col-xl-3 col-lg-4 col-sm-6 product-box">
                            <div class="card card-product">
                                <div class="card-image">
                                    <a href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>">
                                        <?php if(!empty($product->is_cover) ): ?>
                                            <img alt="Image placeholder"
                                                src="<?php echo e($proimg. $product->is_cover); ?>"
                                                class="img-center img-fluid">
                                        <?php else: ?>
                                            <img alt="Image placeholder"
                                                src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>"
                                                class="img-center img-fluid">
                                        <?php endif; ?>
                                    </a>
                                </div>
                                <div class="card-body pt-0">
                                    <span class="static-rating static-rating-sm">
                                        <?php if($store->enable_rating == 'on'): ?>
                                            <?php for($i = 1; $i <= 5; $i++): ?>
                                                <?php
                                                    $icon = 'fa-star';
                                                    $color = '';
                                                    $newVal1 = $i - 0.5;
                                                    if ($product->product_rating() < $i && $product->product_rating() >= $newVal1) {
                                                        $icon = 'fa-star-half-alt';
                                                    }
                                                    if ($product->product_rating() >= $newVal1) {
                                                        $color = 'text-primary';
                                                    }
                                                ?>
                                                <i class="star fas <?php echo e($icon . ' ' . $color); ?>"></i>
                                            <?php endfor; ?>
                                        <?php endif; ?>
                                    </span>
                                    <h6><a class="t-black13"
                                            href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>">
                                            <?php echo e($product->name); ?></a></h6>
                                    <p class="text-sm">
                                        <span class="td-gray"><?php echo e(__('Category')); ?>:</span>
                                        <?php echo e($product->product_category()); ?>

                                    </p>
                                    <div class="product-price mt-3">
                                        <span class="card-price t-black15">
                                            <?php if($product->enable_product_variant == 'on'): ?>
                                                <?php echo e(__('In variant')); ?>

                                            <?php else: ?>
                                                <?php echo e(\App\Models\Utility::priceFormat($product->price)); ?>

                                            <?php endif; ?>
                                        </span>
                                        <?php if($product->enable_product_variant == 'on'): ?>
                                            <a href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>"
                                                class="action-item pcart-icon bg-primary">
                                                <i class="fas fa-shopping-basket"></i>
                                            </a>
                                        <?php else: ?>
                                            <a href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>"
                                                class="action-item pcart-icon bg-primary">
                                                <i class="fas fa-shopping-basket"></i>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="actions card-product-actions">
                                    <?php if(Auth::guard('customers')->check()): ?>
                                        <?php if(!empty($wishlist) && isset($wishlist[$product->id]['product_id'])): ?>
                                            <?php if($wishlist[$product->id]['product_id'] != $product->id): ?>
                                                <button type="button"
                                                    class="action-item wishlist-icon bg-light-gray add_to_wishlist wishlist_<?php echo e($product->id); ?>"
                                                    data-id="<?php echo e($product->id); ?>">
                                                    <i class="far fa-heart"></i>
                                                </button>
                                            <?php else: ?>
                                                <button type="button" class="action-item wishlist-icon bg-light-gray"
                                                    data-id="<?php echo e($product->id); ?>" disabled>
                                                    <i class="fas fa-heart"></i>
                                                </button>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <button type="button"
                                                class="action-item wishlist-icon bg-light-gray add_to_wishlist wishlist_<?php echo e($product->id); ?>"
                                                data-id="<?php echo e($product->id); ?>">
                                                <i class="far fa-heart"></i>
                                            </button>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <button type="button"
                                            class="action-item wishlist-icon bg-light-gray add_to_wishlist wishlist_<?php echo e($product->id); ?>"
                                            data-id="<?php echo e($product->id); ?>">
                                            <i class="far fa-heart"></i>
                                        </button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
        $(document).ready(function() {
            set_variant_price();
        });

        $(document).on('click', '.add_to_wishlist', function(e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            $.ajax({
                type: "POST",
                url: '<?php echo e(route('store.addtowishlist', [$store->slug, '__product_id'])); ?>'.replace(
                    '__product_id', id),
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                },
                success: function(response) {
                    if (response.status == "Success") {
                        show_toastr('Success', response.message, 'success');
                        $('.wishlist_' + response.id).removeClass('add_to_wishlist');
                        $('.wishlist_' + response.id).html('<i class="fas fa-heart"></i>');
                        $('.wishlist_count').html(response.count);
                    } else {
                        show_toastr('Error', response.error, 'error');
                    }
                },
                error: function(result) {}
            });
        });
        $(".add_to_cart").click(function(e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            var variants = [];
            $(".variant-selection").each(function(index, element) {
                variants.push(element.value);
            });

            if (jQuery.inArray('', variants) != -1) {
                show_toastr('Error', "<?php echo e(__('Please select all option.')); ?>", 'error');
                return false;
            }
            var variation_ids = $('#variant_id').val();

            $.ajax({
                url: '<?php echo e(route('user.addToCart', ['__product_id', $store->slug, 'variation_id'])); ?>'.replace(
                    '__product_id', id).replace('variation_id', variation_ids ?? 0),
                type: "POST",
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    variants: variants.join(' : '),
                },
                success: function(response) {
                    if (response.status == "Success") {
                        show_toastr('Success', response.success, 'success');
                        $("#shoping_counts").html(response.item_count);
                    } else {
                        show_toastr('Error', response.error, 'error');
                    }
                },
                error: function(result) {
                    console.log('error');
                }
            });
        });

        $(document).on('change', '#pro_variants_name', function() {
            set_variant_price();
        });

        function set_variant_price() {
            var variants = [];
            $(".variant-selection").each(function(index, element) {
                variants.push(element.value);
            });

            if (variants.length > 0) {
                $.ajax({
                    url: '<?php echo e(route('get.products.variant.quantity')); ?>',
                    data: {
                        "_token": $('meta[name="csrf-token"]').attr('content'),
                        variants: variants.join(' : '),
                        product_id: $('#product_id').val()
                    },

                    success: function(data) {
                        $('.product-price-error').hide();
                        $('.product-price').show();

                        $('.variation_price').html(data.price);
                        $('#variant_id').val(data.variant_id);
                        $('#variant_qty').val(data.quantity);


                        var variant_message_array = [];
                        $( ".variant_loop" ).each(function( index ) {
                                var variant_name = $(this).prev().text();
                                var variant_val = $(this).val();
                                variant_message_array.push(variant_val+" "+variant_name);
                        });
                        var variant_message = variant_message_array.join(" and ");

                        if(data.variant_id == 0) {
                            $('.add_to_cart').hide();

                            $('.product-price').hide();
                            $('.product-price-error').show();
                            var message =  '<span class=" mb-0 text-danger">This product is not available with '+variant_message+'.</span>';
                            $('.product-price-error').html(message);
                        }else{
                            $('.add_to_cart').show();

                        }
                    }
                });
            }
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.theme1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/storelancer/resources/views/storefront/theme1/view.blade.php ENDPATH**/ ?>