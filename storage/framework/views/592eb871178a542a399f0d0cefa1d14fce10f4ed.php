<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Home')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
    <style>
        .p-tablist .nav-tabs .nav-item .nav-link.active {
            font-weight: bold;
        }

        .cat-box {
            max-height: 284px;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php
$imgpath=\App\Models\Utility::get_file('uploads/');
$productImg = \App\Models\Utility::get_file('uploads/is_cover_image/');
$catimg = \App\Models\Utility::get_file('uploads/product_image/');
$default =\App\Models\Utility::get_file('uploads/theme4/header/brand_logo.png');
$s_logo = \App\Models\Utility::get_file('uploads/store_logo/');

?>
<?php $__env->startSection('content'); ?>
<div class="wrapper">
    <?php $__currentLoopData = $pixelScript; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $script): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?= $script; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php $__currentLoopData = $getStoreThemeSetting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ThemeSetting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(isset($ThemeSetting['section_name']) && $ThemeSetting['section_name'] == 'Home-Header' && $ThemeSetting['section_enable'] == 'on'): ?>
            <?php
                $homepage_header_title_key = array_search('Title', array_column($ThemeSetting['inner-list'], 'field_name'));
                $homepage_header_title = $ThemeSetting['inner-list'][$homepage_header_title_key]['field_default_text'];

                $homepage_header_Sub_text_key = array_search('Sub text', array_column($ThemeSetting['inner-list'], 'field_name'));
                $homepage_header_Sub_text = $ThemeSetting['inner-list'][$homepage_header_Sub_text_key]['field_default_text'];

                $homepage_header_Button_key = array_search('Button', array_column($ThemeSetting['inner-list'], 'field_name'));
                $homepage_header_Button = $ThemeSetting['inner-list'][$homepage_header_Button_key]['field_default_text'];

                $homepage_header_bckground_Image_key = array_search('Background Image', array_column($ThemeSetting['inner-list'], 'field_name'));
                $homepage_header_bckground_Image = $ThemeSetting['inner-list'][$homepage_header_bckground_Image_key]['field_default_text'];

                if ($ThemeSetting['section_name'] == 'Home-Header' && $ThemeSetting['section_enable'] == 'on') {
                    $storethemesetting['enable_header_img'] = 'on';
                }

            ?>
            <section class="home-banner-section" style="background-image: url(<?php echo e($imgpath . $homepage_header_bckground_Image); ?>);">
                <div class="container">
                    <div class="banner-text">
                        <h2> <?php echo e(!empty($homepage_header_title) ? $homepage_header_title : 'Home Accessories'); ?>

                        </h2>
                        <p> <?php echo e(!empty($homepage_header_Sub_text) ? $homepage_header_Sub_text : 'There is only that moment and the incredible certainty that everything under the sun has been written by one hand only.'); ?></p>
                        <a href="#" class="cart-btn" id="pro_scroll"> <?php echo e(!empty($homepage_header_Button) ? $homepage_header_Button : __('Start shopping')); ?>

                            <i class="fas fa-shopping-basket"></i>
                        </a>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <section class="store-promotions">
        <div class="offset-container offset-left">
            <div class="store-promotions-inner">
                <div class="row align-items-center">
                    <?php $__currentLoopData = $getStoreThemeSetting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $storethemesetting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(isset($storethemesetting['section_name']) && $storethemesetting['section_name'] == 'Home-Brand-Logo' && $storethemesetting['section_enable'] == 'on'): ?>
                            <div class="col-12">
                                <div class="client-logo-slider">
                                    <?php $__currentLoopData = $storethemesetting['inner-list']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(!empty($image['image_path'])): ?>
                                            <?php $__currentLoopData = $image['image_path']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="client-logo-itm">
                                                        <a href="#">
                                                            <img src="<?php echo e($imgpath . (!empty($img) ? $img : 'storego-image.png')); ?>">
                                                        </a>
                                                    </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <div class="client-logo-itm">
                                                <a href="#">
                                                    <img src="<?php echo e($default); ?>">
                                                </a>
                                            </div>
                                            <div class="client-logo-itm">
                                                <a href="#">
                                                    <img src="<?php echo e($default); ?>">
                                                </a>
                                            </div>
                                            <div class="client-logo-itm">
                                                <a href="#">
                                                    <img src="<?php echo e($default); ?>">
                                                </a>
                                            </div>
                                            <div class="client-logo-itm">
                                                <a href="#">
                                                    <img src="<?php echo e($default); ?>">
                                                </a>
                                            </div>
                                            <div class="client-logo-itm">
                                                <a href="#">
                                                    <img src="<?php echo e($default); ?>">
                                                </a>
                                            </div>
                                            <div class="client-logo-itm">
                                                <a href="#">
                                                    <img src="<?php echo e($default); ?>">
                                                </a>
                                            </div>
                                            <div class="client-logo-itm">
                                                <a href="#">
                                                    <img src="<?php echo e($default); ?>">
                                                </a>
                                            </div>
                                            <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4 col-12">
                        <?php $__currentLoopData = $getStoreThemeSetting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $storethemesetting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($storethemesetting['section_name'] == 'Home-Promotions' && $storethemesetting['section_enable'] == 'on'): ?>
                                <?php if(isset($storethemesetting['homepage-promotions-font-icon']) || isset($storethemesetting['homepage-promotions-title']) || isset($storethemesetting['homepage-promotions-description'])): ?>
                                    <?php for($i = 0; $i < $storethemesetting['loop_number']; $i++): ?>
                                        <div class="store-promotions-box">
                                            <?php echo $storethemesetting['homepage-promotions-font-icon'][$i]; ?>

                                            <div class="store-text">
                                                <h4> <?php echo e($storethemesetting['homepage-promotions-title'][$i]); ?></h4>
                                                <p> <?php echo e($storethemesetting['homepage-promotions-description'][$i]); ?></p>
                                            </div>
                                        </div>
                                        <?php if($i == 2): ?>
                                            <a href="<?php echo e(route('store.categorie.product', [$store->slug, 'Start shopping'])); ?>" class="cart-btn"><?php echo e(__('Show more products')); ?>

                                                <i class="fas fa-shopping-basket"></i>
                                            </a>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                <?php else: ?>   
                                    <?php for($i = 0; $i < $storethemesetting['loop_number']; $i++): ?>
                                        <div class="store-promotions-box">
                                            <?php echo $storethemesetting['inner-list'][0]['field_default_text']; ?>

                                            <div class="store-text">
                                                <h4> <?php echo e($storethemesetting['inner-list'][1]['field_default_text']); ?></h4>
                                                <p>  <?php echo e($storethemesetting['inner-list'][2]['field_default_text']); ?></p>
                                            </div>
                                        </div>
                                        <?php if($i == 2): ?>
                                            <a href="<?php echo e(route('store.categorie.product', [$store->slug, 'Start shopping'])); ?>" class="cart-btn"><?php echo e(__('Show more products')); ?>

                                                <i class="fas fa-shopping-basket"></i>
                                            </a>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </div>
                    <?php $__currentLoopData = $getStoreThemeSetting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $storethemesetting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($storethemesetting['section_name'] == 'Banner-Image'): ?>
                            <?php if($storethemesetting['section_enable'] == 'on'): ?>
                                <div class="col-md-8 col-12">
                                    <div class="store-img">
                                        <img src="<?php echo e($imgpath. (!empty($storethemesetting['inner-list'][0]['field_default_text']) ? $storethemesetting['inner-list'][0]['field_default_text'] : 'banner_image.png')); ?>">
                                    </div>
                                </div>
                            <?php else: ?>   
                                <div class="col-md-8 col-12">
                                    
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>
    <?php if($products['Start shopping']->count() > 0): ?>
        <section class="bestseller-section tabs-wrapper padding-top padding-bottom" id="pro_items">
            <div class="container">
                <div class="bestseller-title">
                    <div class="section-title">
                        <h2><?php echo e(__('Products')); ?></h2>
                        <div class="tab-bar">
                            <ul class="cat-tab tabs">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="tab-link <?php echo e($key == 0 ? 'active' : ''); ?>" data-tab="tab-<?php echo preg_replace('/[^A-Za-z0-9\-]/', '_', $category); ?>">
                                        <a> <?php echo e(__($category)); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        </div>    
                        <a href="<?php echo e(route('store.categorie.product', [$store->slug, 'Start shopping'])); ?>" class="cart-btn"><?php echo e(__('Show more products')); ?>

                            <i class="fas fa-shopping-basket"></i>
                        </a>                
                </div>
                <div class="tabs-container">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div id="tab-<?php echo preg_replace('/[^A-Za-z0-9\-]/', '_', $key); ?>" class="tab-content <?php echo e(($key=='Start shopping')?'active':''); ?>">
                            <div class="row product-row">
                                <?php if($items->count() > 0): ?>
                                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                            <div class="product-card">
                                                <div class="card-img">
                                                    <a href="<?php echo e(route('store.product.product_view',[$store->slug,$product->id])); ?>">
                                                        <?php if(!empty($product->is_cover) ): ?>
                                                            <img src="<?php echo e($productImg.$product->is_cover); ?>" alt="">
                                                        <?php else: ?>
                                                            <img src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>" alt="">
                                                        <?php endif; ?>
                                                    </a>
                                                    
                                                        <?php if(Auth::guard('customers')->check()): ?>
                                                            <?php if(!empty($wishlist) && isset($wishlist[$product->id]['product_id'])): ?>
                                                                <?php if($wishlist[$product->id]['product_id'] != $product->id): ?>
                                                                    <a
                                                                        class="heart-icon action-item wishlist-icon bg-light-gray add_to_wishlist wishlist_<?php echo e($product->id); ?>"
                                                                        data-id="<?php echo e($product->id); ?>">
                                                                        <i class="far fa-heart"></i>
                                                                    </a>
                                                                <?php else: ?>
                                                                    <a class="heart-icon action-item wishlist-icon bg-light-gray"
                                                                        data-id="<?php echo e($product->id); ?>" disabled>
                                                                        <i class="fas fa-heart"></i>
                                                                    </a>
                                                                <?php endif; ?>
                                                            <?php else: ?>
                                                                <a
                                                                    class="heart-icon action-item wishlist-icon bg-light-gray add_to_wishlist wishlist_<?php echo e($product->id); ?>"
                                                                    data-id="<?php echo e($product->id); ?>">
                                                                    <i class="far fa-heart"></i>
                                                                </a>
                                                            <?php endif; ?>
                                                        <?php else: ?>
                                                            <a
                                                                class="heart-icon action-item wishlist-icon bg-light-gray add_to_wishlist wishlist_<?php echo e($product->id); ?>"
                                                                data-id="<?php echo e($product->id); ?>">
                                                                <i class="far fa-heart"></i>
                                                            </a>
                                                        <?php endif; ?>
                                                    
                                                </div>
                                                <div class="card-content">
                                                    <h6>
                                                        <a href="<?php echo e(route('store.product.product_view',[$store->slug,$product->id])); ?>"><?php echo e($product->name); ?></a>
                                                    </h6>
                                                <p><?php echo e(__('Category')); ?>: <?php echo e($product->product_category()); ?>

                                                    </p>
                                                    <div class="rating">
                                                        <?php if($store->enable_rating == 'on'): ?>
                                                            <?php for($i =1;$i<=5;$i++): ?>
                                                                <?php
                                                                    $icon = 'fa-star';
                                                                    $color = '';
                                                                    $newVal1 = ($i-0.5);
                                                                    if($product->product_rating() < $i && $product->product_rating() >= $newVal1)
                                                                    {
                                                                        $icon = 'fa-star-half-alt';
                                                                    }
                                                                    if($product->product_rating() >= $newVal1)
                                                                    {
                                                                        $color = 'text-warning';
                                                                    }
                                                                ?>
                                                                <i class="star fas <?php echo e($icon .' '. $color); ?>"></i>
                                                            <?php endfor; ?>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="last-btn">
                                                        <div class="price">
                                                            <ins>
                                                                <?php if($product->enable_product_variant == 'on'): ?>
                                                                    <?php echo e(__('In variant')); ?>

                                                                <?php else: ?>
                                                                    <?php echo e(\App\Models\Utility::priceFormat($product->price)); ?>

                                                                <?php endif; ?>
                                                            </ins>
                                                        </div>
                                                        <?php if($product->enable_product_variant == 'on'): ?>
                                                            <a href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>" class="cart-btn"> <i class="fas fa-shopping-basket"></i><?php echo e(__('Add To Cart')); ?></a>
                                                        <?php else: ?>
                                                        <a data-id="<?php echo e($product->id); ?>" class="cart-btn add_to_cart"> <i class="fas fa-shopping-basket"></i><?php echo e(__('Add To Cart')); ?></a>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 product-card">
                                        <h6 class="no_record"><i class="fas fa-ban"></i> <?php echo e(__('No Record Found')); ?></h6>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <?php $__currentLoopData = $getStoreThemeSetting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $storethemesetting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(isset($storethemesetting['section_name']) && $storethemesetting['section_name'] == 'Home-Categories' && $storethemesetting['section_enable'] == 'on' && !empty($pro_categories)): ?>
            <?php
                // dd($storethemesetting);
                $Titlekey = array_search('Title', array_column($storethemesetting['inner-list'], 'field_name'));
                $Title = $storethemesetting['inner-list'][$Titlekey]['field_default_text'];

                $Description_key = array_search('Description', array_column($storethemesetting['inner-list'], 'field_name'));
                $Description = $storethemesetting['inner-list'][$Description_key]['field_default_text'];
            ?>
            <section class="category-section padding-bottom padding-top">
                <div class="container">
                    <div class="bestseller-title">
                        <div class="section-title">
                            <h2> <?php echo e(!empty($Title) ? $Title : 'Categories'); ?></h2>
                            <p> <?php echo e(!empty($Description) ? $Description : 'There is only that moment and the incredible certainty <br> that everything under the sun has been written by one hand only.'); ?></p>
                            </div>    
                            <a href="<?php echo e(route('store.categorie.product', [$store->slug, 'Start shopping'])); ?>" class="cart-btn"><?php echo e(__('Show more products')); ?>

                                <i class="fas fa-shopping-basket"></i>
                            </a>                
                    </div>
                    <div class="row product-row">
                        <?php $__currentLoopData = $pro_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pro_categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="category-box">
                                    <div class="category-card-inner">
                                        <div class="category-content-top">
                                            <h3>
                                                <a><?php echo e($pro_categorie->name); ?></a>
                                            </h3>
                                            <div class="category-card-img">
                                                <?php if(!empty($pro_categorie->categorie_img)): ?>
                                                    <a href="#">
                                                        <img src="<?php echo e($catimg . (!empty($pro_categorie->categorie_img) ? $pro_categorie->categorie_img : 'default.jpg')); ?>" alt="">
                                                    </a>
                                                <?php else: ?>
                                                    <a href="#">
                                                        <img src="<?php echo e(asset(Storage::url('uploads/product_image/default.jpg'))); ?>" alt="">
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        
                                        <div class="category-content-bottom">
                                            <p><?php echo e(__('Products')); ?>: <?php echo e(!empty($product_count[$key]) ? $product_count[$key] : '0'); ?></p>
                                            <a href="<?php echo e(route('store.categorie.product', [$store->slug, $pro_categorie->name])); ?>" class="cart-btn"><?php echo e(__('Show more products')); ?>

                                                <i class="fas fa-shopping-basket"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php if($getStoreThemeSetting[2]['section_enable'] == 'on'): ?>
        <?php $__currentLoopData = $getStoreThemeSetting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $storethemesetting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(isset($storethemesetting['section_name']) && $storethemesetting['section_name'] == 'Home-Email-Subscriber' && $storethemesetting['section_enable'] == 'on'): ?>
                <?php
                $emailsubs_img_key = array_search('Subscriber Background Image', array_column($storethemesetting['inner-list'], 'field_name'));
                $emailsubs_img = $storethemesetting['inner-list'][$emailsubs_img_key]['field_default_text'];

                $SubscriberTitle_key = array_search('Subscriber Title', array_column($storethemesetting['inner-list'], 'field_name'));
                $SubscriberTitle = $storethemesetting['inner-list'][$SubscriberTitle_key]['field_default_text'];

                $SubscriberDescription_key = array_search('Subscriber Description', array_column($storethemesetting['inner-list'], 'field_name'));
                $SubscriberDescription = $storethemesetting['inner-list'][$SubscriberDescription_key]['field_default_text'];

                $SubscribeButton_key = array_search('Subscribe Button Text', array_column($storethemesetting['inner-list'], 'field_name'));
                $SubscribeButton = $storethemesetting['inner-list'][$SubscribeButton_key]['field_default_text'];
                ?>
                <section class="subcribe-section" style="background-image: url(<?php echo e($imgpath  . $emailsubs_img); ?>);">
                    <div class="container">
                        <div class="subcribe-inner">
                            <h2><?php echo e(!empty($SubscriberTitle) ? $SubscriberTitle : 'Always on time'); ?></h2>
                            <p><?php echo e(!empty($SubscriberDescription) ? $SubscriberDescription : 'Subscription here'); ?></p>
                            <?php echo e(Form::open(['route' => ['subscriptions.store_email', $store->id], 'method' => 'POST'])); ?>

                            <div class="input-box">
                                <?php echo e(Form::email('email', null, ['placeholder' => __('TYPE YOUR EMAIL ADDRESS...')])); ?>

                                <button type="submit"> <span class="btn-inner--text"><?php echo e($SubscribeButton); ?></span> <i class="fas fa-paper-plane"></i></button>
                            </div>
                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                </section>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    
    <?php if(count($topRatedProducts) > 0): ?>
        <section class="total-rated-product padding-top padding-bottom">
            <div class="container">
                <div class="section-title d-flex align-items-center justify-content-between">
                    <h2 ><?php echo e(__('Top rated products')); ?></h2>
                    <a href="<?php echo e(route('store.categorie.product', $store->slug)); ?>" class="cart-btn"><?php echo e(__('Show more products')); ?></a>
                </div>
                <div class="row  product-row">
                    <?php $__currentLoopData = $topRatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $topRatedProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                            <div class="product-card">
                                <div class="card-img">
                                    <a href="<?php echo e(route('store.product.product_view', [$store->slug, $topRatedProduct->product_id])); ?>">
                                        <?php if(!empty($topRatedProduct->product->is_cover)): ?>
                                            <img src="<?php echo e($productImg . $topRatedProduct->product->is_cover); ?>">
                                        <?php else: ?>
                                            <img src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>">
                                        <?php endif; ?>
                                    </a>
                                    <?php if(Auth::guard('customers')->check()): ?>
                                        <?php if(!empty($wishlist) && isset($wishlist[$topRatedProduct->product->id]['product_id'])): ?>
                                            <?php if($wishlist[$topRatedProduct->product->id]['product_id'] != $topRatedProduct->product->id): ?>
                                                <a
                                                    class="heart-icon action-item wishlist-icon bg-light-gray add_to_wishlist wishlist_<?php echo e($topRatedProduct->product->id); ?>"
                                                    data-id="<?php echo e($topRatedProduct->product->id); ?>">
                                                    <i class="far fa-heart"></i>
                                                </a>
                                            <?php else: ?>
                                                <a class="heart-icon action-item wishlist-icon bg-light-gray"
                                                    data-id="<?php echo e($topRatedProduct->product->id); ?>" disabled>
                                                    <i class="fas fa-heart"></i>
                                                </a>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <a
                                                class="heart-icon action-item wishlist-icon bg-light-gray add_to_wishlist wishlist_<?php echo e($topRatedProduct->product->id); ?>"
                                                data-id="<?php echo e($topRatedProduct->product->id); ?>">
                                                <i class="far fa-heart"></i>
                                            </a>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <a
                                            class="heart-icon action-item wishlist-icon bg-light-gray add_to_wishlist wishlist_<?php echo e($topRatedProduct->product->id); ?>"
                                            data-id="<?php echo e($topRatedProduct->product->id); ?>">
                                            <i class="far fa-heart"></i>
                                        </a>
                                    <?php endif; ?>
                                </div>
                                <div class="card-content">
                                    <h6>
                                        <a href="<?php echo e(route('store.product.product_view', [$store->slug, $topRatedProduct->product_id])); ?>"><?php echo e($topRatedProduct->product->name); ?></a>
                                    </h6>
                                <p><?php echo e(__('Category')); ?>:  <?php echo e($topRatedProduct->product->product_category()); ?>

                                    </p>
                                    <div class="rating">
                                        <?php if($store->enable_rating == 'on'): ?>
                                            <?php for($i = 1; $i <= 5; $i++): ?>
                                                <?php
                                                    $icon = 'fa-star';
                                                    $color = '';
                                                    $newVal1 = $i - 0.5;
                                                    if ($topRatedProduct->product->product_rating() < $i && $topRatedProduct->product->product_rating() >= $newVal1) {
                                                        $icon = 'fa-star-half-alt';
                                                    }
                                                    if ($topRatedProduct->product->product_rating() >= $newVal1) {

                                                        $color = 'text-warning';

                                                    }
                                                ?>

                                            <i class="star fas <?php echo e($icon . ' ' . $color); ?>"></i>
                                            <?php endfor; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="last-btn">
                                        <div class="price">
                                            <ins>
                                                <?php if($topRatedProduct->product->enable_product_variant == 'on'): ?>
                                                    <?php echo e(__('In variant')); ?>

                                                <?php else: ?>
                                                    <?php echo e(\App\Models\Utility::priceFormat($topRatedProduct->product->price)); ?>

                                                <?php endif; ?>
                                            </ins>
                                        </div>
                                        <?php if($topRatedProduct->product->enable_product_variant == 'on'): ?>
                                            <a href="<?php echo e(route('store.product.product_view', [$store->slug, $topRatedProduct->product->id])); ?>" class="cart-btn"><i class="fas fa-shopping-basket"></i></a>
                                        <?php else: ?>
                                            <a data-id="<?php echo e($topRatedProduct->product->id); ?>" class="cart-btn add_to_cart"><?php echo e(__('Add to cart')); ?>  <i class="fas fa-shopping-basket"></i></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <?php if($getStoreThemeSetting[5]['section_enable'] == 'on'): ?>
        <section class="testimonial-section padding-top padding-bottom">
            <div class="container">
                <div class="testimonial-title">
                    <?php $__currentLoopData = $getStoreThemeSetting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $storethemesetting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(isset($storethemesetting['section_name']) && $storethemesetting['section_name'] == 'Home-Testimonial' && $storethemesetting['array_type'] == 'inner-list' && $storethemesetting['section_enable'] == 'on'): ?>
                            <?php
                                $Heading_key = array_search('Heading', array_column($storethemesetting['inner-list'], 'field_name'));
                                $Heading = $storethemesetting['inner-list'][$Heading_key]['field_default_text'];

                                $HeadingSubText_key = array_search('Heading Sub Text', array_column($storethemesetting['inner-list'], 'field_name'));
                                $HeadingSubText = $storethemesetting['inner-list'][$HeadingSubText_key]['field_default_text'];
                            ?>
                            <h3 class="h1"> <?php echo e(!empty($storethemesetting['testimonial_main_heading']) ? $storethemesetting['testimonial_main_heading'] : 'Testimonials'); ?></h3>
                            <p><?php echo e(!empty($storethemesetting['testimonial_main_heading_title'])
                                ? $storethemesetting['testimonial_main_heading_title']
                                : 'There is only that moment and the incredible certainty that everything under the sun has been written by one hand only.'); ?></p>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="testimonial-slider">
                    <?php $__currentLoopData = $getStoreThemeSetting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $storethemesetting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                        <?php if(isset($storethemesetting['section_name']) && $storethemesetting['section_name'] == 'Home-Testimonial' && $storethemesetting['array_type'] == 'multi-inner-list'): ?>
                            <?php if(isset($storethemesetting['homepage-testimonial-card-image']) || isset($storethemesetting['homepage-testimonial-card-title']) || isset($storethemesetting['homepage-testimonial-card-sub-text']) || isset($storethemesetting['homepage-testimonial-card-description']) || isset($storethemesetting['homepage-testimonial-card-enable'])): ?>
                                <?php for($i = 0; $i < $storethemesetting['loop_number']; $i++): ?>
                                    <?php if($storethemesetting['homepage-testimonial-card-enable'][$i] == 'on'): ?>
                                        <div class="testimonial-card">
                                            <div class="testimonial-inner">
                                                <p>
                                                    <?php echo e($storethemesetting['homepage-testimonial-card-description'][$i]); ?>

                                                </p>
                                                <div class="review-box">
                                                    <img src="<?php echo e($imgpath. (!empty($storethemesetting['homepage-testimonial-card-image'][$i]['field_prev_text']) ? $storethemesetting['homepage-testimonial-card-image'][$i]['field_prev_text'] : 'qo.png')); ?>">

                                                    <div class="review-inner">
                                                        <h5> <?php echo e($storethemesetting['homepage-testimonial-card-title'][$i]); ?></h5>
                                                        <h6><?php echo e($storethemesetting['homepage-testimonial-card-sub-text'][$i]); ?></h6>
                                                    </div>
                                                
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            <?php else: ?>
                                <?php for($i = 0; $i < $storethemesetting['loop_number']; $i++): ?>
                                    <div class="testimonial-card">
                                        <div class="testimonial-inner">
                                            <p>
                                                <?php echo e($storethemesetting['inner-list'][4]['field_default_text']); ?>

                                            </p>
                                            <div class="review-box">
                                                <img src="<?php echo e($imgpath. (!empty($storethemesetting['inner-list'][1]['field_default_text']) ? $storethemesetting['inner-list'][1]['field_default_text'] : '')); ?>">
                
                                                <div class="review-inner">
                                                    <h5> <?php echo e($storethemesetting['inner-list'][2]['field_default_text']); ?></h5>
                                                    <h6><?php echo e($storethemesetting['inner-list'][3]['field_default_text']); ?></h6>
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
        </section>
    <?php endif; ?>
 </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
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

        $(".productTab").click(function(e) {
            e.preventDefault();
            $('.productTab').removeClass('active')

        });

        $("#pro_scroll").click(function() {
            $('html, body').animate({
                scrollTop: $("#pro_items").offset().top
            }, 100);
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.theme4', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/storelancer_new/resources/views/storefront/theme4/index.blade.php ENDPATH**/ ?>