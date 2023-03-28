<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Home')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php
    $imgpath=\App\Models\Utility::get_file('uploads/is_cover_image/');

?>
<?php $__env->startSection('content'); ?>

    

    <section class="my-cart-section pt-3 mb-5 mt-3">
        <?php if($products['Start shopping']->count() > 0): ?>
            <div class="container">
                <!-- Shopping cart table -->
                <div class="row align-items-center">
                    <div class="col-md-12 col-lg-2">
                        <h3 class="font-weight-400 m-md-0 text-primary">
                            <?php echo e(__('Product')); ?>

                        </h3>
                    </div>
                    <div class="col-md-12 col-lg-10">
                        <div class="nav nav-tabs nav-fill border-0 justify-content-end" id="nav-tab" role="tablist">
                            <div class="product-tab d-flex border border-secondary no-gutters">
                                <ul class="tabs bg-primary" role="tablist" id="myTab">

                                    
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="<?php echo e($category == $categorie_name ? 'active' : ''); ?> bg-primary">
                                            <a href="#<?php echo preg_replace('/[^A-Za-z0-9\-]/', '_', $category); ?>" data-id="<?php echo e($key); ?>"
                                                class="<?php echo e($key == 0 ? 'active' : ''); ?> productTab bg-primary"
                                                id="electronic-tab" data-toggle="tab" role="tab" aria-controls="home"
                                                aria-selected="false">
                                                <?php echo e(__($category)); ?>

                                            </a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bestsellers-tabs mt-3" id="nav-tabContent">

                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="tab-content row <?php echo e(($key==$categorie_name)?'active show':''); ?> "
                            id="<?php echo preg_replace('/[^A-Za-z0-9\-]/', '_', $key); ?>" role="tabpanel" aria-labelledby="shopping-tab">

                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-3 col-sm-6 col-md-4 product-box swiper-slide mt-3">
                                    <div class="border-0 card card-product rounded-lg">
                                        <div
                                            class="align-items-center border-0 card-header d-flex justify-content-between p-0 pt-4 pr-3">
                                            <?php if(Auth::guard('customers')->check()): ?>
                                            <?php if(!empty($wishlist) && isset($wishlist[$product->id]['product_id'])): ?>
                                                <?php if($wishlist[$product->id]['product_id'] != $product->id): ?>
                                                    <button data-toggle="tooltip" data-original-title="Wishlist"
                                                        type="button"
                                                        class="badge badge-primary border-0 p-0 position-absolute px-2 py-2 right-4 rounded-circle top-3 zindex-100  add_to_wishlist wishlist_<?php echo e($product->id); ?>"
                                                        data-id="<?php echo e($product->id); ?>">
                                                        <i class="far fa-heart text-white"></i>
                                                    </button>
                                                <?php else: ?>
                                                    <button data-toggle="tooltip" data-original-title="Wishlist"
                                                        type="button"
                                                        class="badge badge-primary border-0 p-0 position-absolute px-2 py-2 right-4 rounded-circle top-3 zindex-100 "
                                                        data-id="<?php echo e($product->id); ?>" disabled>
                                                        <i class="fas fa-heart text-white"></i>
                                                    </button>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <button data-toggle="tooltip" data-original-title="Wishlist"
                                                    type="button"
                                                    class="badge badge-primary border-0 p-0 position-absolute px-2 py-2 right-4 rounded-circle top-3 zindex-100  add_to_wishlist wishlist_<?php echo e($product->id); ?>"
                                                    data-id="<?php echo e($product->id); ?>">
                                                    <i class="far fa-heart text-white"></i>
                                                </button>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <button data-toggle="tooltip" data-original-title="Wishlist"
                                                type="button"
                                                class="badge badge-primary border-0 p-0 position-absolute px-2 py-2 right-4 rounded-circle top-3 zindex-100  add_to_wishlist wishlist_<?php echo e($product->id); ?>"
                                                data-id="<?php echo e($product->id); ?>">
                                                <i class="far fa-heart text-white"></i>
                                            </button>
                                        <?php endif; ?>
                                        </div>
                                        <div class="card-image col-9 mx-auto pt-4 pb-4">
                                            <a
                                                href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>">
                                                <?php if(!empty($product->is_cover) ): ?>
                                                    <img alt="Image placeholder"
                                                        src="<?php echo e($imgpath . $product->is_cover); ?>"
                                                        class="img-center img-fluid">
                                                <?php else: ?>
                                                    <img alt="Image placeholder"
                                                        src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>"
                                                        class="img-center img-fluid">
                                                <?php endif; ?>
                                            </a>
                                        </div>
                                        <div class="card-body pt-0 pb-4 px-4 px-md-3 px-lg-4">
                                            <h6>
                                                <a class="font-weight-300 text-primary" href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>">
                                                    <span class="font-weight-600">
                                                        <?php echo e($product->name); ?>

                                                    </span>

                                                </a>
                                            </h6>
                                            <p class="text-sm">
                                                <span class="td-gray"><?php echo e(__('Category:')); ?></span>
                                                <?php echo e($product->getCategoryById($product->id)); ?>

                                            </p>
                                            <div class="mb-3">
                                                <span class="font-weight-600 text-lg text-primary">
                                                    <?php if($product->enable_product_variant == 'on'): ?>
                                                        <?php echo e(__('In variant')); ?>

                                                    <?php else: ?>
                                                        <?php echo e(\App\Models\Utility::priceFormat($product->price)); ?>

                                                        <span
                                                            class="font-weight-500 text-sm text-primary sub-price">
                                                            <?php if($product->enable_product_variant == 'off'): ?>
                                                                <?php echo e(\App\Models\Utility::priceFormat($product->last_price)); ?>

                                                            <?php endif; ?>
                                                        </span>
                                                    <?php endif; ?>
                                                </span>
                                                <div>
                                                    <span class="font-size-12 font-weight-600 text-primary">
                                                        <svg width="14" height="14" viewBox="0 0 14 14"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg"
                                                            class="mr-1">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M5.6846 1.54449C6.14218 0.144023 8.10781 0.144027 8.5654 1.54449L9.38429 4.05075C9.41301 4.13865 9.4936 4.19876 9.5854 4.20075L12.1696 4.25677C13.5864 4.28749 14.191 6.08576 13.0846 6.97816L10.9486 8.70091C10.8804 8.75594 10.8516 8.84689 10.8757 8.93155L11.6348 11.6008C12.0332 13.0019 10.4448 14.1165 9.27925 13.2537L7.25325 11.7538C7.17694 11.6973 7.07306 11.6973 6.99675 11.7538L4.97074 13.2537C3.80522 14.1165 2.21676 13.0019 2.61521 11.6008L3.37428 8.93155C3.39835 8.84689 3.36961 8.75594 3.30138 8.70091L1.16544 6.97816C0.0590049 6.08576 0.663576 4.28749 2.08036 4.25677L4.6646 4.20075C4.7564 4.19876 4.83699 4.13865 4.86571 4.05075L5.6846 1.54449ZM7.33077 1.95425C7.2654 1.75419 6.9846 1.75419 6.91923 1.95425L6.10034 4.46051C5.89929 5.07584 5.33518 5.49658 4.69255 5.51051L2.10831 5.56653C1.90592 5.57092 1.81955 5.82782 1.97761 5.9553L4.11356 7.67806C4.59113 8.06325 4.79234 8.69988 4.62381 9.2925L3.86474 11.9617C3.80782 12.1619 4.03475 12.3211 4.20125 12.1978L6.22726 10.698C6.76144 10.3025 7.48855 10.3025 8.02274 10.698L10.0487 12.1978C10.2153 12.3211 10.4422 12.1619 10.3853 11.9617L9.62618 9.2925C9.45765 8.69988 9.65887 8.06324 10.1364 7.67806L12.2724 5.9553C12.4305 5.82782 12.3441 5.57092 12.1417 5.56653L9.55745 5.51051C8.91482 5.49658 8.35071 5.07584 8.14966 4.46051L7.33077 1.95425Z"
                                                                fill="#8A8A8A" />
                                                        </svg>

                                                        <?php echo e($product->product_rating()); ?> / <?php echo e(__('5.0')); ?>

                                                    </span>
                                                </div>


                                            </div>
                                            
                                            <?php if($product->enable_product_variant == 'on'): ?>
                                            <a href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>"
                                                class="border-0 btn btn-block btn-primary rounded-pill">
                                                <?php echo e(__('ADD TO CART')); ?>

                                            </a>
                                        <?php else: ?>
                                            <a href="javascript:void(0)"
                                                class="border-0 btn btn-block btn-primary rounded-pill add_to_cart"
                                                data-id="<?php echo e($product->id); ?>">
                                                <?php echo e(__('ADD TO CART')); ?>

                                            </a>
                                        <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

            </div>
            </div>
        <?php endif; ?>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
        // $(document).ready(function() {
        //     <?php if($categorie_name == 'Start shopping'): ?>

        //         $('#Furniture').addClass('active');
        //         $("#myTab li:eq(0)").addClass('active');
        //     <?php endif; ?>
        //     // $("#myTab li a:eq(0)").addClass('active');
        // });
        // Tab js
        $('#myTab li').click(function() {
            var $this = $(this);
            var $theTab = $(this).attr('data-tab');
            if ($this.hasClass('active')) {} else {
                $this.closest('.tabs-wrapper').find('ul.tabs li, .tabs-container .tab-content').removeClass(
                    'active');
                $('.tabs-container .tab-content[id="' + $theTab + '"], ul.tabs li[data-tab="' + $theTab + ']')
                    .addClass('active');
            }
            $('ul.tabs li').removeClass('active');
            $(this).addClass('active');
            // $('.product-tab-slider').slick('refresh');
        });

        $(".productTab").click(function(e) {
            e.preventDefault();
            $('.productTab').removeClass('active')

        });
        $(document).on('click', '.qty-plus', function() {
            $(this).prev().val(+$(this).prev().val() + 1);
        });
        $(document).on('click', '.qty-minus', function() {
            if ($(this).next().val() > 0) $(this).next().val(+$(this).next().val() - 1);
        });
        $(document).ready(function() {
            $('.tab-a').click(function() {
                $(".tab-pane").removeClass('tab-active');
                $(".tab-pane[data-id='" + $(this).attr('data-id') + "']").addClass("tab-active");
                $(".tab-a").removeClass('active-a');
                $(this).parent().find(".tab-a").addClass('active-a');
            });
        });

        $(document).on('change', '.variant-selection', function() {
            var variants = [];
            let selected = $(this);
            $(this).each(function(index, element) {

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
                        $('.variation_price').html(data.price);
                        $('#variant_id').val(data.variant_id);
                        $('#variant_qty').val(data.quantity);
                    }
                });
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.theme10', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ahmedwaleed/dev/storelancer/resources/views/storefront/theme10/product.blade.php ENDPATH**/ ?>