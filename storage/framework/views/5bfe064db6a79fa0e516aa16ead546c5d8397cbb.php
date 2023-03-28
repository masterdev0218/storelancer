<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Home')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php
$imgpath=\App\Models\Utility::get_file('uploads/');
$productImg = \App\Models\Utility::get_file('uploads/is_cover_image/');
$catimg = \App\Models\Utility::get_file('uploads/product_image/');
$default =\App\Models\Utility::get_file('uploads/theme10/header/brand_logo.jpg');
$s_logo = \App\Models\Utility::get_file('uploads/store_logo/');

?>
<?php $__env->startSection('content'); ?>
    <!-- Main Banner -->
    <?php $__currentLoopData = $getStoreThemeSetting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ThemeSetting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(isset($ThemeSetting['section_name']) &&
            $ThemeSetting['section_name'] == 'Home-Header' &&
            $ThemeSetting['section_enable'] == 'on'): ?>
            <?php
                $homepage_header_img_key = array_search('Background Image', array_column($ThemeSetting['inner-list'], 'field_name'));
                $homepage_header_img = $ThemeSetting['inner-list'][$homepage_header_img_key]['field_default_text'];

                $homepage_header_title_key = array_search('Title', array_column($ThemeSetting['inner-list'], 'field_name'));
                $homepage_header_title = $ThemeSetting['inner-list'][$homepage_header_title_key]['field_default_text'];

                $homepage_header_subtxt_key = array_search('Sub text', array_column($ThemeSetting['inner-list'], 'field_name'));
                $homepage_header_subtxt = $ThemeSetting['inner-list'][$homepage_header_subtxt_key]['field_default_text'];

                $homepage_header_btn_key = array_search('Button', array_column($ThemeSetting['inner-list'], 'field_name'));
                $homepage_header_btn = $ThemeSetting['inner-list'][$homepage_header_btn_key]['field_default_text'];
            ?>

            <div class="position-relative">

                <div class="position-relative home-banner">
                    <div class="swiper-container" data-swiper-items="1" data-swiper-space-between="0">
                        <div class="swiper-wrapper">

                            <section class=" py-6 w-100 swiper-slide" data-offset-top="#header-main"
                                style="background-image: url(<?php echo e($imgpath . $homepage_header_img); ?>); background-position: right bottom 20%; background-repeat: no-repeat;">
                                <div class="container">
                                    <div class="row justify-content-between">
                                        <div class="col-md-7 col-xl-6">
                                            <h2 class="store-title text-primary">
                                                <?php echo e($homepage_header_title); ?>

                                            </h2>
                                            <p class="col-md-10 col-10 mx-auto mx-md-0 mt-4 px-0 store-dcs">
                                                <?php echo e($homepage_header_subtxt); ?>

                                            </p>
                                            <div>
                                                <a href="<?php echo e(route('store.categorie.product', [$store->slug, 'Start shopping'])); ?>"
                                                    class="btn btn-primary mt-3">
                                                    <?php echo e($homepage_header_btn); ?>

                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </section>

                        </div>
                    </div>
                    <!-- Add Pagination -->

                </div>

            </div>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <section class="bg-transparent position-relative zindex-100">
        <div class="container">
            <div class="bg-primary p-4">
                <form action="<?php echo e(route('store.categorie.product', [$store->slug, 'Start shopping'])); ?>" method="get">
                    <?php echo csrf_field(); ?>
                    <div class="d-flex form-group position-relative mb-0 flex-wrap">
                        <div class="col-md-8 px-0 mb-2 mb-md-0">
                            <span class="left-3 position-absolute top-2">
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0 8.25C0 12.8063 3.69365 16.5 8.25 16.5C10.1548 16.5 11.9088 15.8545 13.3052 14.7702C13.3578 14.8815 13.4302 14.9858 13.5222 15.0778L20.1222 21.6778C20.5518 22.1074 21.2482 22.1074 21.6778 21.6778C22.1074 21.2482 22.1074 20.5518 21.6778 20.1222L15.0778 13.5222C14.9858 13.4302 14.8815 13.3578 14.7702 13.3052C15.8545 11.9088 16.5 10.1548 16.5 8.25C16.5 3.69365 12.8063 0 8.25 0C3.69365 0 0 3.69365 0 8.25ZM2.2 8.25C2.2 4.90868 4.90868 2.2 8.25 2.2C11.5913 2.2 14.3 4.90868 14.3 8.25C14.3 11.5913 11.5913 14.3 8.25 14.3C4.90868 14.3 2.2 11.5913 2.2 8.25Z"
                                        fill="black" />
                                </svg>
                            </span>
                            <input class="font-size-12 pl-5 form-control h-100 py-3 rounded-0 border-0 bg-white shadow-none"
                                type="text" placeholder="Type car part..." name="search_data">
                        </div>

                        <li class="nav-item dropdown col-md-3 mb-2 mb-md-0 px-0 px-md-3 category-li">
                            <a class="align-items-center justify-content-between d-flex font-size-12 pr-0 w-100 bg-white h-100 px-3 py-3 py-md-0"
                                href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <span class="category-dropdown">
                                </span>


                                <svg id="catIcon" width="10" height="10" viewBox="0 0 10 10" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6 0.999958C6 0.447696 5.55228 3.88832e-07 5 4.37114e-07C4.44771 4.85396e-07 4 0.447696 4 0.999958L4 6.58593L1.70711 4.29313C1.31658 3.90263 0.683417 3.90263 0.292892 4.29313C-0.097633 4.68364 -0.0976329 5.31678 0.292892 5.70729L4.29289 9.70712C4.48043 9.89465 4.73478 10 5 10C5.26522 10 5.51957 9.89465 5.70711 9.70712L9.70711 5.70729C10.0976 5.31678 10.0976 4.68364 9.70711 4.29313C9.31658 3.90262 8.68342 3.90262 8.29289 4.29313L6 6.58593L6 0.999958Z"
                                        fill="black" />
                                </svg>
                            </a>
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a class="dropdown-item font-size-12 text-capitalize category-options productTab"
                                        id="electronic-tab" data-toggle="tab" role="tab" aria-controls="home"
                                        aria-selected="false" href="javascript:void(0);"
                                        data-active='<?php echo e($category); ?>'><?php echo e($category); ?></a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </li>

                        <div class="col-md-1 px-0">
                            <button class="bg-dark btn-block border-0 h-100 px-3 py-3 py-md-2 rounded-0 top-0"
                                type="submit">
                                <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_8_776)">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M0.5 12C0.5 11.4477 0.947715 11 1.5 11L21.0858 11L14.7932 4.7071C14.4026 4.31657 14.4027 3.6834 14.7932 3.29288C15.1837 2.90236 15.8169 2.90238 16.2074 3.29291L24.2071 11.2929C24.5976 11.6834 24.5976 12.3166 24.2071 12.7071L16.2074 20.7071C15.8169 21.0976 15.1837 21.0976 14.7932 20.7071C14.4027 20.3166 14.4026 19.6834 14.7932 19.2929L21.0858 13L1.5 13C0.947715 13 0.5 12.5523 0.5 12Z"
                                            fill="white"></path>
                                    </g>
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>


    <!-- Products -->
    <section class="bestsellers-section mt-0 pt-5 custom-bkg">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                <h2 class="font-weight-300 my-0 text-dark title-size"><?php echo e(__('Popular parts')); ?></h2>
                <a href="<?php echo e(route('store.categorie.product', [$store->slug, 'Start shopping'])); ?>" class="btn btn-primary"><?php echo e(__('GO TO SHOP')); ?></a>
            </div>

            
            <div class="bestsellers-tabs mt-5">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-12 tab-content category-tab <?php echo e($key == 'Start shopping' ? 'active ' : ''); ?>"
                        id="<?php echo preg_replace('/[^A-Za-z0-9\-]/', '_', $key); ?>" role="tabpanel" aria-labelledby="shopping-tab"
                        data-content='<?php echo e($key); ?>'>

                        <div class="swiper-wrapper">
                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($key < 4): ?>
                                    <div class="col-lg-3 col-sm-6 col-md-4 product-box swiper-slide">
                                        <div class="border-0 card card-product rounded-0 shadow">
                                            <div
                                                class="align-items-center border-0 card-header d-flex justify-content-between p-0 pt-4 pr-3">

                                                <?php if($product->enable_product_variant == 'on'): ?>

                                                <span
                                                class="badge badge-primary rounded-0 font-weight-300 font-size-12 py-2 px-3">
                                                <?php echo e(__('Variant')); ?>

                                            </span>
                                            <?php else: ?>
                                                <span
                                                    class="badge badge-primary rounded-0 font-weight-300 font-size-12 py-2 px-3">
                                                    <?php echo e(\App\Models\Utility::priceFormat($product->price - $product->last_price)); ?>

                                                    <?php echo e(__('off')); ?>

                                                </span>
                                                <?php endif; ?>
                                                <?php if(Auth::guard('customers')->check()): ?>
                                                    <?php if(!empty($wishlist) && isset($wishlist[$product->id]['product_id'])): ?>
                                                        <?php if($wishlist[$product->id]['product_id'] != $product->id): ?>
                                                            <button data-toggle="tooltip" data-original-title="Wishlist"
                                                                type="button"
                                                                class="bg-transparent border-0 p-0 position-absolute right-4 top-3 zindex-100  add_to_wishlist wishlist_<?php echo e($product->id); ?>"
                                                                data-id="<?php echo e($product->id); ?>">
                                                                <i class="far fa-heart text-primary"></i>
                                                            </button>
                                                        <?php else: ?>
                                                            <button data-toggle="tooltip" data-original-title="Wishlist"
                                                                type="button"
                                                                class="bg-transparent border-0 p-0 position-absolute right-4 top-3 zindex-100 "
                                                                data-id="<?php echo e($product->id); ?>" disabled>
                                                                <i class="fas fa-heart text-primary"></i>
                                                            </button>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <button data-toggle="tooltip" data-original-title="Wishlist"
                                                            type="button"
                                                            class="bg-transparent border-0 p-0 position-absolute right-4 top-3 zindex-100  add_to_wishlist wishlist_<?php echo e($product->id); ?>"
                                                            data-id="<?php echo e($product->id); ?>">
                                                            <i class="far fa-heart text-primary"></i>
                                                        </button>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <button data-toggle="tooltip" data-original-title="Wishlist"
                                                        type="button"
                                                        class="bg-transparent border-0 p-0 position-absolute right-4 top-3 zindex-100  add_to_wishlist wishlist_<?php echo e($product->id); ?>"
                                                        data-id="<?php echo e($product->id); ?>">
                                                        <i class="far fa-heart text-primary"></i>
                                                    </button>
                                                <?php endif; ?>


                                            </div>
                                            <div class="card-image col-8 mx-auto pt-4 pb-4">
                                                <a
                                                    href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>">
                                                    <?php if(!empty($product->is_cover) ): ?>
                                                        <img alt="Image placeholder"
                                                            src="<?php echo e($productImg . $product->is_cover); ?>"
                                                            class="img-center img-fluid">
                                                    <?php else: ?>
                                                        <img alt="Image placeholder"
                                                            src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>"
                                                            class="img-center img-fluid">
                                                    <?php endif; ?>
                                                </a>
                                            </div>
                                            <div class="card-body pt-0 pb-4 px-4 px-md-3 px-lg-4">
                                                <h6 class="mb-0">
                                                    <a class="font-weight-600"
                                                        href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>">
                                                        <?php echo e($product->name); ?>

                                                    </a>
                                                </h6>
                                                <span class="font-weight-600 text-black-50 text-small">
                                                    <?php echo e(__('Category:')); ?>

                                                    <?php echo e($product->categories->name); ?>

                                                </span>
                                                <div class="mb-2">
                                                    <span class="font-weight-600 text-lg text-primary">
                                                        <?php if($product->enable_product_variant == 'on'): ?>
                                                            <?php echo e(__('In variant')); ?>

                                                        <?php else: ?>
                                                            <?php echo e(\App\Models\Utility::priceFormat($product->price)); ?>

                                                        <?php endif; ?>
                                                    </span>
                                                    <del class="font-size-12 font-weight-600 text-black-50 ml-2">
                                                        <?php if($product->enable_product_variant == 'off'): ?>
                                                            <?php echo e(\App\Models\Utility::priceFormat($product->last_price)); ?>

                                                        <?php endif; ?>
                                                    </del>
                                                </div>
                                                <?php if($product->enable_product_variant == 'on'): ?>
                                                    <a href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>"
                                                        class="border-0 btn btn-block btn-primary ">
                                                        <?php echo e(__('ADD TO CART')); ?>

                                                    </a>
                                                <?php else: ?>
                                                    <a href="javascript:void(0)"
                                                        class="border-0 btn btn-block btn-primary  add_to_cart"
                                                        data-id="<?php echo e($product->id); ?>">
                                                        <?php echo e(__('ADD TO CART')); ?>

                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

        </div>

    </section>


    <!-- Image with Text -->
    <?php $__currentLoopData = $getStoreThemeSetting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ThemeSetting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(isset($ThemeSetting['section_name']) &&
            $ThemeSetting['section_name'] == 'Latest-Category' &&
            $ThemeSetting['section_enable'] == 'on'): ?>
            <?php
                $homepage_header_title_key = array_search('Title', array_column($ThemeSetting['inner-list'], 'field_name'));
                $homepage_header_title = $ThemeSetting['inner-list'][$homepage_header_title_key]['field_default_text'];

                $homepage_header_subtxt_key = array_search('Sub text', array_column($ThemeSetting['inner-list'], 'field_name'));
                $homepage_header_subtxt = $ThemeSetting['inner-list'][$homepage_header_subtxt_key]['field_default_text'];

                $homepage_header_btn_key = array_search('Button', array_column($ThemeSetting['inner-list'], 'field_name'));
                $homepage_header_btn = $ThemeSetting['inner-list'][$homepage_header_btn_key]['field_default_text'];
            ?>

            <section class="image-with-text pb-4 pb-md-7">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-4 mb-4 mb-md-0 text-center text-md-left">
                            <h2 class="title-size font-weight-300 text-primary mb-4">
                                <?php echo e($homepage_header_title); ?>

                            </h2>
                            <p class="font-size-12">
                                <?php echo e($homepage_header_subtxt); ?>

                            </p>
                            <a href="<?php echo e(route('store.categorie.product', [$store->slug, 'Start shopping'])); ?>"
                                class="btn btn-primary">
                                <?php echo e($homepage_header_btn); ?>

                            </a>
                        </div>
                        <div class="col-md-8 mb-4 mb-md-0">
                            <div class="row">
                                <?php $__currentLoopData = $latest2category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_c => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($key_c < 2): ?>
                                        <div class="<?php echo e($key_c == 0 ? 'col-md-6 mb-4 mb-md-0' : 'col-md-6'); ?>">

                                            <div class="featured-item">
                                                <?php if(!empty($category->categorie_img) ): ?>
                                                    <img alt="Image placeholder"
                                                        src="<?php echo e($catimg. (!empty($category->categorie_img) ? $category->categorie_img : 'default.jpg')); ?>">
                                                <?php else: ?>
                                                    <img alt="Image placeholder"
                                                        src="<?php echo e(asset(Storage::url('uploads/product_image/default.jpg'))); ?>">
                                                <?php endif; ?>
                                                <div
                                                    class="caption position-absolute bottom-0 left-0 w-100 d-flex justify-content-between align-items-end pl-4">
                                                    <div>
                                                        <h2 class="font-weight-300 text-white"> <?php echo e($category->name); ?></h2>
                                                    </div>
                                                    <a href="<?php echo e(route('store.categorie.product', [$store->slug, $category->name])); ?>"
                                                        class="btn btn-primary px-3">
                                                        <svg width="25" height="24" viewBox="0 0 25 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <g clip-path="url(#clip0_20_4009)">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M0.5 12C0.5 11.4477 0.947715 11 1.5 11L21.0858 11L14.7932 4.7071C14.4026 4.31657 14.4027 3.6834 14.7932 3.29288C15.1837 2.90236 15.8169 2.90238 16.2074 3.29291L24.2071 11.2929C24.5976 11.6834 24.5976 12.3166 24.2071 12.7071L16.2074 20.7071C15.8169 21.0976 15.1837 21.0976 14.7932 20.7071C14.4027 20.3166 14.4026 19.6834 14.7932 19.2929L21.0858 13L1.5 13C0.947715 13 0.5 12.5523 0.5 12Z"
                                                                    fill="#F7F6F1" />
                                                            </g>
                                                            <defs>
                                                                <clipPath id="clip0_20_4009">
                                                                    <rect width="24" height="24" fill="white"
                                                                        transform="matrix(-1 0 0 1 24.5 0)" />
                                                                </clipPath>
                                                            </defs>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    
    <?php $__currentLoopData = $getStoreThemeSetting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ThemeSetting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(isset($ThemeSetting['section_name']) &&
            $ThemeSetting['section_name'] == 'Latest-Products' &&
            $ThemeSetting['section_enable'] == 'on'): ?>
            <?php
                $latestCatTitle_key = array_search('Title', array_column($ThemeSetting['inner-list'], 'field_name'));
                $latestCatTitle = $ThemeSetting['inner-list'][$latestCatTitle_key]['field_default_text'];

                $latestCatSubText_key = array_search('Sub text', array_column($ThemeSetting['inner-list'], 'field_name'));
                $latestCatSubText = $ThemeSetting['inner-list'][$latestCatSubText_key]['field_default_text'];

                $latestCatButton_key = array_search('Button', array_column($ThemeSetting['inner-list'], 'field_name'));
                $latestCatButton = $ThemeSetting['inner-list'][$latestCatButton_key]['field_default_text'];

                $latestCatTagImg_key = array_search('Category Tag Image', array_column($ThemeSetting['inner-list'], 'field_name'));
                $latestCatTagImg = $ThemeSetting['inner-list'][$latestCatTagImg_key]['field_default_text'];

                $latestCatbackGround_key = array_search('Category Background Image', array_column($ThemeSetting['inner-list'], 'field_name'));
                $latestCatbackGround = $ThemeSetting['inner-list'][$latestCatbackGround_key]['field_default_text'];
                // dD($latestCatbackGround);
            ?>
            
            <section class="bg-cover pt-5 w-100" data-offset-top="#header-main"
                style="background-image: url(<?php echo e($imgpath. $latestCatbackGround); ?>); background-position: center center; background-repeat: no-repeat;">
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-md-5 col-lg-5 text-center text-md-left mb-4 mb-md-0">
                            <img src="<?php echo e($imgpath. $latestCatTagImg); ?>" class="col-4 px-0 mb-4">
                            <h2 class="font-weight-300 text-white">
                                <?php echo e($latestCatTitle); ?>

                            </h2>
                            <p class="mt-4 store-dcs text-white">
                                <?php echo e($latestCatSubText); ?>

                            </p>
                            <div>
                                <a href="<?php echo e(route('store.categorie.product', [$store->slug, 'Start shopping'])); ?>"
                                    class="btn btn-white mt-3">
                                    <?php echo e($latestCatButton); ?>

                                </a>
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-6 mb-n6">

                            <div class="row">
                                
                                <?php $__currentLoopData = $latestProduct10; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keys => $latestProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-6 product-box">
                                        <div class="border-0 card card-product rounded-0 shadow">
                                            <div
                                                class="align-items-center border-0 card-header d-flex justify-content-between p-0 pt-4 pr-3">
                                                <?php if($latestProduct->enable_product_variant == 'on'): ?>

                                                <span
                                                class="badge badge-primary rounded-0 font-weight-300 font-size-12 py-2 px-3">

                                                <?php echo e(__('Variant')); ?>

                                            </span>
                                            <?php else: ?>
                                                <span
                                                    class="badge badge-primary rounded-0 font-weight-300 font-size-12 py-2 px-3">

                                                    <?php echo e(\App\Models\Utility::priceFormat($latestProduct->price - $latestProduct->last_price)); ?>

                                                    <?php echo e(__('off')); ?>

                                                </span>
                                                <?php endif; ?>
                                                <?php if(Auth::guard('customers')->check()): ?>
                                                    <?php if(!empty($wishlist) && isset($wishlist[$latestProduct->id]['product_id'])): ?>
                                                        <?php if($wishlist[$latestProduct->id]['product_id'] != $latestProduct->id): ?>
                                                            <button data-toggle="tooltip" data-original-title="Wishlist"
                                                                type="button"
                                                                class="bg-transparent border-0 p-0 position-absolute right-4 top-3 zindex-100  add_to_wishlist wishlist_<?php echo e($latestProduct->id); ?>"
                                                                data-id="<?php echo e($latestProduct->id); ?>">
                                                                <i class="far fa-heart text-primary"></i>
                                                            </button>
                                                        <?php else: ?>
                                                            <button data-toggle="tooltip" data-original-title="Wishlist"
                                                                type="button"
                                                                class="bg-transparent border-0 p-0 position-absolute right-4 top-3 zindex-100 "
                                                                data-id="<?php echo e($latestProduct->id); ?>" disabled>
                                                                <i class="fas fa-heart text-primary"></i>
                                                            </button>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <button data-toggle="tooltip" data-original-title="Wishlist"
                                                            type="button"
                                                            class="bg-transparent border-0 p-0 position-absolute right-4 top-3 zindex-100  add_to_wishlist wishlist_<?php echo e($latestProduct->id); ?>"
                                                            data-id="<?php echo e($latestProduct->id); ?>">
                                                            <i class="far fa-heart text-primary"></i>
                                                        </button>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <button data-toggle="tooltip" data-original-title="Wishlist"
                                                        type="button"
                                                        class="bg-transparent border-0 p-0 position-absolute right-4 top-3 zindex-100  add_to_wishlist wishlist_<?php echo e($latestProduct->id); ?>"
                                                        data-id="<?php echo e($latestProduct->id); ?>">
                                                        <i class="far fa-heart text-primary"></i>
                                                    </button>
                                                <?php endif; ?>

                                            </div>
                                            <div class="card-image col-8 mx-auto pt-4 pb-4">
                                                <a
                                                    href="<?php echo e(route('store.product.product_view', [$store->slug, $latestProduct->id])); ?>">
                                                    <?php if(!empty($latestProduct->is_cover)): ?>
                                                        <img alt="Image placeholder"
                                                            src="<?php echo e($productImg . $latestProduct->is_cover); ?>"
                                                            class="img-center img-fluid">
                                                    <?php else: ?>
                                                        <img alt="Image placeholder"
                                                            src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>"
                                                            class="img-center img-fluid">
                                                    <?php endif; ?>
                                                </a>
                                            </div>
                                            <div class="card-body pt-0 pb-4 px-4 px-md-3 px-lg-4">
                                                <h6 class="mb-0">

                                                    <a class="font-weight-600"
                                                        href="<?php echo e(route('store.product.product_view', [$store->slug, $latestProduct->id])); ?>">

                                                        <?php echo e($latestProduct->name); ?>

                                                    </a>
                                                </h6>
                                                <span class="font-weight-600 text-black-50 text-small">
                                                    <?php echo e(__('Category:')); ?>

                                                    <?php echo e($latestProduct->categories->name); ?>

                                                </span>
                                                <div class="mb-2">
                                                    <span class="font-weight-600 text-lg text-primary">
                                                        <?php if($latestProduct->enable_product_variant == 'on'): ?>
                                                            <?php echo e(__('In variant')); ?>

                                                        <?php else: ?>
                                                            <?php echo e(\App\Models\Utility::priceFormat($latestProduct->price)); ?>

                                                        <?php endif; ?>
                                                    </span>
                                                    <del class="font-size-12 font-weight-600 text-black-50 ml-2">
                                                        <?php if($latestProduct->enable_product_variant == 'off'): ?>
                                                            <?php echo e(\App\Models\Utility::priceFormat($latestProduct->last_price)); ?>

                                                        <?php endif; ?>
                                                    </del>
                                                </div>
                                                <?php if($latestProduct->enable_product_variant == 'on'): ?>
                                                    <a href="<?php echo e(route('store.product.product_view', [$store->slug, $latestProduct->id])); ?>"
                                                        class="border-0 btn btn-block btn-primary ">
                                                        <?php echo e(__('ADD TO CART')); ?>

                                                    </a>
                                                <?php else: ?>
                                                    <a href="javascript:void(0)"
                                                        class="border-0 btn btn-block btn-primary  add_to_cart"
                                                        data-id="<?php echo e($latestProduct->id); ?>">
                                                        <?php echo e(__('ADD TO CART')); ?>

                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>

                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <!-- Articles Categories-->
    <?php if($getStoreThemeSetting[3]['section_enable'] == 'on'): ?>
        <section class="slice categorie-section pt-8 pb-4 position-relative">
            <div class="container">
                <div class="row justify-content-between align-items-center mb-md-5 text-center text-md-left">
                    <?php $__currentLoopData = $getStoreThemeSetting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $storethemesetting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(isset($storethemesetting['section_name']) &&
                            $storethemesetting['section_name'] == 'Home-Categories' &&
                            !empty($pro_categories)): ?>
                            <?php
                                $Titlekey = array_search('Title', array_column($storethemesetting['inner-list'], 'field_name'));
                                $Title = $storethemesetting['inner-list'][$Titlekey]['field_default_text'];

                                $Description_key = array_search('Description', array_column($storethemesetting['inner-list'], 'field_name'));
                                $Description = $storethemesetting['inner-list'][$Description_key]['field_default_text'];
                            ?>
                            <div class="col-md-6">
                                <h2 class="text-primary title-size-1 font-weight-300 mb-3 mb-md-0">
                                    <?php echo e($Title); ?>

                                </h2>
                            </div>
                            <div class="col-md-5">
                                <p class="font-size-12">
                                    <?php echo e($Description); ?>

                                </p>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="row">
                    <?php $__currentLoopData = $pro_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pro_categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-sm-6 col-md-4 mb-3  ">
                            <div class="shadow">
                                <div class="cat-box">

                                    <?php if(!empty($pro_categorie->categorie_img) ): ?>
                                        <img alt="Image placeholder"
                                            src="<?php echo e($catimg . (!empty($pro_categorie->categorie_img) ? $pro_categorie->categorie_img : 'default.jpg')); ?>">
                                    <?php else: ?>
                                        <img alt="Image placeholder"
                                            src="<?php echo e(asset(Storage::url('uploads/product_image/default.jpg'))); ?>">
                                    <?php endif; ?>
                                    <a href="<?php echo e(route('store.categorie.product', [$store->slug, $pro_categorie->name])); ?>"
                                        class="badge badge-white font-size-12 left-4 ls-15 mb-0 position-absolute px-3 py-3 rounded-5 text-primary top-4 zindex-100 ">
                                        <?php echo e($pro_categorie->name); ?></a>
                                    <a href="<?php echo e(route('store.categorie.product', [$store->slug, $pro_categorie->name])); ?>"
                                        class="bottom-0 btn btn-primary position-absolute px-3 right-0 text-primary">
                                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_20_4058)">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M0.5 12C0.5 11.4477 0.947715 11 1.5 11L21.0858 11L14.7932 4.7071C14.4026 4.31657 14.4027 3.6834 14.7932 3.29288C15.1837 2.90236 15.8169 2.90238 16.2074 3.29291L24.2071 11.2929C24.5976 11.6834 24.5976 12.3166 24.2071 12.7071L16.2074 20.7071C15.8169 21.0976 15.1837 21.0976 14.7932 20.7071C14.4027 20.3166 14.4026 19.6834 14.7932 19.2929L21.0858 13L1.5 13C0.947715 13 0.5 12.5523 0.5 12Z"
                                                    fill="#F7F6F1" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_20_4058">
                                                    <rect width="24" height="24" fill="white"
                                                        transform="matrix(-1 0 0 1 24.5 0)" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Products -->
    <section class="bestsellers-section mt-0 pt-5">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                <h2 class="font-weight-300 my-0 text-dark title-size"><?php echo e(__('Top Rated Products')); ?></h2>
                <a href="<?php echo e(route('store.categorie.product', [$store->slug, 'Start shopping'])); ?>" class="btn btn-primary"><?php echo e(__('GO TO SHOP')); ?></a>
            </div>


            <div class="bestsellers-tabs mt-5">
                <div class="col-lg-12 ">
                    <div class="swiper-container swiper-container-horizontal" data-swiper-items="1"
                        data-swiper-space-between="0" data-swiper-sm-items="2" data-swiper-xl-items="4">
                        <div class="swiper-wrapper">
                            <?php if(count($topRatedProducts) > 0): ?>
                                <?php $__currentLoopData = $topRatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $topRatedProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <div class="col-lg-3 col-sm-6 col-md-4 product-box swiper-slide">
                                        <div class="border-0 card card-product rounded-0 shadow">
                                            <div
                                                class="align-items-center border-0 card-header d-flex justify-content-between p-0 pt-4 pr-3">
                                                <?php if($topRatedProduct->product->enable_product_variant == 'on'): ?>

                                                <span
                                                class="badge badge-primary rounded-0 font-weight-300 font-size-12 py-2 px-3">
                                                <?php echo e(__('Variant')); ?>

                                            </span>
                                            <?php else: ?>
                                                <span
                                                    class="badge badge-primary rounded-0 font-weight-300 font-size-12 py-2 px-3">

                                                    <?php echo e(\App\Models\Utility::priceFormat($topRatedProduct->product->price - $topRatedProduct->product->last_price)); ?>

                                                    <?php echo e(__('off')); ?>

                                                </span>
                                                <?php endif; ?>
                                                <?php if(Auth::guard('customers')->check()): ?>
                                                    <?php if(!empty($wishlist) && isset($wishlist[$topRatedProduct->product->id]['product_id'])): ?>
                                                        <?php if($wishlist[$topRatedProduct->product->id]['product_id'] != $topRatedProduct->product->id): ?>
                                                            <button data-toggle="tooltip" data-original-title="Wishlist"
                                                                type="button"
                                                                class="bg-transparent border-0 p-0 position-absolute right-4 top-3 zindex-100  add_to_wishlist wishlist_<?php echo e($topRatedProduct->product->id); ?>"
                                                                data-id="<?php echo e($topRatedProduct->product->id); ?>">
                                                                <i class="far fa-heart text-primary"></i>
                                                            </button>
                                                        <?php else: ?>
                                                            <button data-toggle="tooltip" data-original-title="Wishlist"
                                                                type="button"
                                                                class="bg-transparent border-0 p-0 position-absolute right-4 top-3 zindex-100 "
                                                                data-id="<?php echo e($topRatedProduct->product->id); ?>" disabled>
                                                                <i class="fas fa-heart text-primary"></i>
                                                            </button>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <button data-toggle="tooltip" data-original-title="Wishlist"
                                                            type="button"
                                                            class="bg-transparent border-0 p-0 position-absolute right-4 top-3 zindex-100  add_to_wishlist wishlist_<?php echo e($topRatedProduct->product->id); ?>"
                                                            data-id="<?php echo e($topRatedProduct->product->id); ?>">
                                                            <i class="far fa-heart text-primary"></i>
                                                        </button>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <button data-toggle="tooltip" data-original-title="Wishlist"
                                                        type="button"
                                                        class="bg-transparent border-0 p-0 position-absolute right-4 top-3 zindex-100  add_to_wishlist wishlist_<?php echo e($topRatedProduct->product->id); ?>"
                                                        data-id="<?php echo e($topRatedProduct->product->id); ?>">
                                                        <i class="far fa-heart text-primary"></i>
                                                    </button>
                                                <?php endif; ?>

                                            </div>
                                            <div class="card-image col-8 mx-auto pt-4 pb-4">
                                                <a
                                                    href="<?php echo e(route('store.product.product_view', [$store->slug, $topRatedProduct->product->id])); ?>">
                                                    <?php if(!empty($topRatedProduct->product->is_cover)): ?>
                                                        <img alt="Image placeholder"
                                                            src="<?php echo e($productImg . $topRatedProduct->product->is_cover); ?>"
                                                            class="img-center img-fluid">
                                                    <?php else: ?>
                                                        <img alt="Image placeholder"
                                                            src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>"
                                                            class="img-center img-fluid">
                                                    <?php endif; ?>
                                                </a>
                                            </div>
                                            <div class="card-body pt-0 pb-4 px-4 px-md-3 px-lg-4">
                                                <h6 class="mb-0">

                                                    <a class="font-weight-600"
                                                        href="<?php echo e(route('store.product.product_view', [$store->slug, $topRatedProduct->product->id])); ?>">
                                                        <?php echo e($topRatedProduct->product->name); ?>

                                                    </a>
                                                </h6>
                                                <span class="font-weight-600 text-black-50 text-small">
                                                    <?php echo e(__('Category:')); ?>

                                                    <?php echo e($topRatedProduct->product->product_category()); ?>

                                                </span>
                                                <div class="mb-2">
                                                    <span class="font-weight-600 text-lg text-primary">
                                                        <?php if($topRatedProduct->product->enable_product_variant == 'on'): ?>
                                                            <?php echo e(__('In variant')); ?>

                                                        <?php else: ?>
                                                            <?php echo e(\App\Models\Utility::priceFormat($topRatedProduct->product->price)); ?>

                                                        <?php endif; ?>
                                                    </span>
                                                    <del class="font-size-12 font-weight-600 text-black-50 ml-2">
                                                        <?php if($topRatedProduct->product->enable_product_variant == 'off'): ?>
                                                            <?php echo e(\App\Models\Utility::priceFormat($topRatedProduct->product->last_price)); ?>

                                                        <?php endif; ?>
                                                    </del>
                                                </div>
                                                <?php if($topRatedProduct->product->enable_product_variant == 'on'): ?>
                                                    <a href="<?php echo e(route('store.product.product_view', [$store->slug, $topRatedProduct->product->id])); ?>"
                                                        class="border-0 btn btn-block btn-primary ">
                                                        <?php echo e(__('ADD TO CART')); ?>

                                                    </a>
                                                <?php else: ?>
                                                    <a href="javascript:void(0)"
                                                        class="border-0 btn btn-block btn-primary  add_to_cart"
                                                        data-id="<?php echo e($topRatedProduct->product->id); ?>">
                                                        <?php echo e(__('ADD TO CART')); ?>

                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                    </div>
                </div>
            </div>

        </div>

    </section>


    <!-- Image with Text -->
    <?php $__currentLoopData = $getStoreThemeSetting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ThemeSetting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(isset($ThemeSetting['section_name']) &&
            $ThemeSetting['section_name'] == 'Top-Purchased' &&
            $ThemeSetting['section_enable'] == 'on'): ?>
            <?php
                $homepage_header_img_key = array_search('Background Image', array_column($ThemeSetting['inner-list'], 'field_name'));
                $homepage_header_img = $ThemeSetting['inner-list'][$homepage_header_img_key]['field_default_text'];

                $homepage_header_title_key = array_search('Title', array_column($ThemeSetting['inner-list'], 'field_name'));
                $homepage_header_title = $ThemeSetting['inner-list'][$homepage_header_title_key]['field_default_text'];

                $homepage_header_subtext_key = array_search('Sub text', array_column($ThemeSetting['inner-list'], 'field_name'));
                $homepage_header_subtext = $ThemeSetting['inner-list'][$homepage_header_subtext_key]['field_default_text'];

                $homepage_header_btn_key = array_search('Button Text', array_column($ThemeSetting['inner-list'], 'field_name'));
                $homepage_header_btn = $ThemeSetting['inner-list'][$homepage_header_btn_key]['field_default_text'];
            ?>
            <section class="image-with-text pt-md-4 custom-img-text position-relative">


                <?php $__currentLoopData = $mostPurchased; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $details = App\Models\Order::productImg($products_data->product_id);
                ?>
                <div class="col-md-6 pl-0">
                    <a href="<?php echo e(route('store.product.product_view', [$store->slug, $products_data->id])); ?>">
                        <?php if(!empty($details->is_cover)): ?>
                            <img alt="Image placeholder"
                                src="<?php echo e($productImg. $details->is_cover); ?>"
                                class=" img-fluid ">
                        <?php else: ?>
                            <img alt="Image placeholder"
                                src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>"
                                class=" img-fluid ">
                        <?php endif; ?>
                    </a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 mb-4 mb-md-0 ml-auto">
                            <h4 class="mb-4 text-primary title-size font-weight-300">
                                <?php echo e($homepage_header_title); ?>

                            </h4>
                            <p class="font-size-12 font-weight-300 mb-4">
                                <?php echo e($homepage_header_subtext); ?>

                            </p>
                            <a href="<?php echo e(route('store.categorie.product', [$store->slug, 'Start shopping'])); ?>"
                                class="btn btn-primary">
                                <?php echo e($homepage_header_btn); ?>

                            </a>

                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    <!-- Testimonials (v1) -->
    <?php $__currentLoopData = $getStoreThemeSetting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $storethemesetting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(isset($storethemesetting['section_name']) &&
            $storethemesetting['section_name'] == 'Home-Testimonial' &&
            $storethemesetting['array_type'] == 'inner-list' &&
            $storethemesetting['section_enable'] == 'on'): ?>
            <?php
                $Heading_key = array_search('Heading', array_column($storethemesetting['inner-list'], 'field_name'));
                $Heading = $storethemesetting['inner-list'][$Heading_key]['field_default_text'];

            ?>
            <section class="slice testimonial-section pb-4 pb-lg-7 pt-md-5">
                <div class="container pt-4">

                    <h2 class="font-weight-300 title-size mb-3">
                        <?php echo e($Heading); ?>

                    </h2>

                    <div class="testimonial-slider position-relative">
                        <div class="swiper-js-container position-relative">

                            <div class="swiper-container" data-swiper-items="1" data-swiper-space-between="0"
                                data-swiper-sm-items="1" data-swiper-md-items="2" data-swiper-xl-items="3">
                                <div class="swiper-wrapper">
                                    <?php $__currentLoopData = $getStoreThemeSetting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $storethemesetting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(isset($storethemesetting['section_name']) &&
                                            $storethemesetting['section_name'] == 'Home-Testimonial' &&
                                            $storethemesetting['array_type'] == 'multi-inner-list'): ?>
                                            <?php if(isset($storethemesetting['homepage-testimonial-card-image']) ||
                                                isset($storethemesetting['homepage-testimonial-card-title']) ||
                                                isset($storethemesetting['homepage-testimonial-card-sub-text']) ||
                                                isset($storethemesetting['homepage-testimonial-card-description']) ||
                                                isset($storethemesetting['homepage-testimonial-card-enable'])): ?>
                                                <?php for($i = 0; $i < $storethemesetting['loop_number']; $i++): ?>
                                                    <?php if($storethemesetting['homepage-testimonial-card-enable'][$i] == 'on'): ?>
                                                        <div class="swiper-slide p-3">
                                                            <div
                                                                class="border-0 card rounded-0 shadow-none bg-transparent">
                                                                <div class="card-body p-3 border border-primary">
                                                                    <h6 class="text-primary font-weight-300 mb-4">
                                                                        <?php echo e($storethemesetting['homepage-testimonial-card-description'][$i]); ?>

                                                                    </h6>
                                                                    <div
                                                                        class="d-md-flex justify-content-between align-items-center">
                                                                        <p
                                                                            class="align-items-center d-flex text-black-50 font-size-12 mb-0">
                                                                            <span class="badge-circle badge-md  mr-3">
                                                                                <img alt="Image placeholder"
                                                                                    src="<?php echo e($imgpath . $storethemesetting['homepage-testimonial-card-image'][$i]['field_prev_text']); ?>"
                                                                                    class="w-100">
                                                                            </span>
                                                                            <span class="font-weight-600">
                                                                                <?php echo e($storethemesetting['homepage-testimonial-card-title'][$i]); ?>

                                                                            </span>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endfor; ?>
                                            <?php else: ?>
                                                <?php for($i = 0; $i < $storethemesetting['loop_number']; $i++): ?>
                                                    <div class="swiper-slide p-3">
                                                        <div class="border-0 card rounded-0 shadow-none bg-transparent">
                                                            <div class="card-body p-3 border border-primary">
                                                                <h6 class="text-primary font-weight-300 mb-4">
                                                                    <?php echo e($storethemesetting['inner-list'][3]['field_default_text']); ?>

                                                                </h6>
                                                                <div
                                                                    class="d-md-flex justify-content-between align-items-center">
                                                                    <p
                                                                        class="align-items-center d-flex text-black-50 font-size-12 mb-0">
                                                                        <span class="badge-circle badge-md  mr-3">
                                                                            <img alt="Image placeholder"
                                                                                src="<?php echo e($imgpath . (!empty($storethemesetting['inner-list'][1]['field_default_text']) ? $storethemesetting['inner-list'][1]['field_default_text'] : 'avatar.png')); ?>"
                                                                                class="w-100">
                                                                        </span>
                                                                        <span class="font-weight-600">
                                                                            <?php echo e($storethemesetting['inner-list'][2]['field_default_text']); ?>

                                                                        </span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endfor; ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                </div>
                            </div>
                            <!-- Add Pagination -->
                            <div class="swiper-pagination w-100 mt-1 d-flex align-items-center justify-content-center">
                            </div>

                            <!-- Add Arrow -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>

                </div>
            </section>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    
    <?php if($getStoreThemeSetting[7]['section_enable'] == 'on'): ?>
        <div class="insta-section py-5 py-md-6">
            <div class="container">

                <div class="row align-items-center mb-4">
                    <div class="col-md-3">
                        <h2 class="font-weight-300 mb-0 mb-3 text-center text-md-left text-primary title-size"><span
                                class="text-dark d-block"></span>
                            <?php echo e($getStoreThemeSetting[7]['inner-list'][1]['field_default_text']); ?></h2>
                    </div>
                    <div class="col-md-6">
                        <p class="font-size-12">
                            <?php echo e($getStoreThemeSetting[7]['inner-list'][2]['field_default_text']); ?>

                        </p>
                    </div>
                </div>



                <?php $__currentLoopData = $getStoreThemeSetting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $storethemesetting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(isset($storethemesetting['section_name']) &&
                        $storethemesetting['section_name'] == 'Home-Brand-Logo' &&
                        $storethemesetting['section_enable'] == 'on'): ?>
                        <?php $__currentLoopData = $storethemesetting['inner-list']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($image['field_slug'] == 'homepage-brand-logo-input'): ?>
                                <?php if(!empty($image['image_path'])): ?>
                                    <div class="swiper-js-container position-relative w-100">
                                        <div class="swiper-container" data-swiper-items="1"
                                            data-swiper-space-between="25" data-swiper-items="2" data-swiper-sm-items="4"
                                            data-swiper-lg-items="6">
                                            <div class="swiper-wrapper">
                                                <?php $__currentLoopData = $image['image_path']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="insta-item swiper-slide">
                                                        <a href="#"
                                                            class="position-relative d-block rounded-md overflow-hidden">
                                                            <img src="<?php echo e($imgpath . (!empty($img) ? $img : 'theme5/brand_logo/brand_logo.png')); ?>"
                                                                alt="Footer logo"
                                                                class="img-fluid position-absolute top-0 left-0 w-100 h-100">
                                                        </a>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                        <!-- Add Arrow -->
                                        <div class="swiper-button-prev"></div>
                                        <div class="swiper-button-next"></div>
                                    </div>
                                <?php else: ?>
                                    <center>
                                        <a href="" class="d-block overflow-hidden position-relative rounded-md">

                                            <img src="<?php echo e($default); ?>"
                                                alt="Footer logo" class=" img-fluid "
                                                style="max-height: 169px; border-radius: 1.2rem !important;">
                                        </a>
                                    </center>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    <?php endif; ?>

    

    <?php $__currentLoopData = $getStoreThemeSetting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $storethemesetting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(isset($storethemesetting['section_name']) &&
            $storethemesetting['section_name'] == 'Home-Email-Subscriber' &&
            $storethemesetting['section_enable'] == 'on'): ?>
            <?php
                $SubscriberTitle_key = array_search('Subscriber Title', array_column($storethemesetting['inner-list'], 'field_name'));
                $SubscriberTitle = $storethemesetting['inner-list'][$SubscriberTitle_key]['field_default_text'];
            ?>
            <div class="container">
                <div class="bg-primary p-3 p-md-4 p-lg-5">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-md-5">
                            <h4 class="font-weight-300 mb-md-0 text-white"><span class="font-weight-500 d-block">
                                    <?php echo e($SubscriberTitle); ?>

                                </span>
                            </h4>
                        </div>
                        <div class="col-md-5">
                            <?php echo e(Form::open(['route' => ['subscriptions.store_email', $store->id], 'method' => 'POST'])); ?>

                            <div class="d-flex form-group position-relative">

                                <?php echo e(Form::email('email', null, ['class' => 'font-size-12 form-control h-100 py-3 rounded-0 border-0 bg-white shadow-none', 'aria-label' => 'Enter your email address...', 'placeholder' => __('Enter Your Email Address...')])); ?>

                                <button class="bg-dark border-0 h-100 position-absolute px-3 right-0 rounded-0 top-0"
                                    type="submit">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_8_776)">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M0.5 12C0.5 11.4477 0.947715 11 1.5 11L21.0858 11L14.7932 4.7071C14.4026 4.31657 14.4027 3.6834 14.7932 3.29288C15.1837 2.90236 15.8169 2.90238 16.2074 3.29291L24.2071 11.2929C24.5976 11.6834 24.5976 12.3166 24.2071 12.7071L16.2074 20.7071C15.8169 21.0976 15.1837 21.0976 14.7932 20.7071C14.4027 20.3166 14.4026 19.6834 14.7932 19.2929L21.0858 13L1.5 13C0.947715 13 0.5 12.5523 0.5 12Z"
                                                fill="white" />
                                        </g>
                                    </svg>
                                </button>
                            </div>
                            <?php echo e(Form::close()); ?>

                            <p class="font-size-12 text-white mb-0">
                                <?php echo e(__('Enter your address and accept the activation link')); ?>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-page'); ?>
    <script>
        $("#start_shopping").click(function() {
            $([document.documentElement, document.body]).animate({
                scrollTop: $("#shopping_section").offset().top
            }, 2000);
        });
    </script>

    <script>
        $(document).on('change', '.variant-selection', function() {

            var variants = [];

            $(this).each(function(index, element) {

                variants.push(element.value);
            });

            let product_id = $(this).closest(".card-body").find('.product_id').val();
            let variation_price = $(this).closest(".card-product").find('.variation_price');

            if (variants.length > 0) {

                $.ajax({
                    url: '<?php echo e(route('get.products.variant.quantity')); ?>',
                    data: {
                        "_token": $('meta[name="csrf-token"]').attr('content'),
                        variants: variants.join(' : '),
                        product_id: product_id
                    },
                    success: function(data) {
                        variation_price.html(data.price);
                        $('#variant_id').val(data.variant_id);
                        $('#variant_qty').val(data.quantity);
                    }
                });
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.category-options').eq(0).click();
        });

        $('.category-options').on('click', function() {

            var catNames = $(this).html();
            $('.category-dropdown').html(catNames);

            $(this).removeClass('active');
            $(this).addClass('active');

            var catNames_active = $(this).attr('data-active');
            $('.category-tab').removeClass('active');
            $('.category-tab[data-content="' + catNames_active + '"]').addClass('active');

        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.theme10', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/storelancer/resources/views/storefront/theme10/index.blade.php ENDPATH**/ ?>