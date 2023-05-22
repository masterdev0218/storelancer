<?php
$data = DB::table('settings');

$data = $data
    ->where('created_by', '>', 1)
    ->where('store_id', $store->id)
    ->where('name', 'SITE_RTL')
    ->first();
?>
<!DOCTYPE html>
<html lang="en" dir="<?php echo e(empty($data) ? '' : ($data->value == 'on' ? 'rtl' : '' )); ?>">
<?php
$userstore = \App\Models\UserStore::where('store_id', $store->id)->first();
$setting = DB::table('settings')
->where('name', 'company_favicon')
->where('store_id', $store->id)
->first();
    $settings = Utility::settings();
$getStoreThemeSetting = Utility::getStoreThemeSetting($store->id, $store->theme_dir);
$getStoreThemeSetting1 = [];
$themeClass = $store->store_theme;

if (!empty($getStoreThemeSetting['dashboard'])) {
    $getStoreThemeSetting = json_decode($getStoreThemeSetting['dashboard'], true);
    $getStoreThemeSetting1 = Utility::getStoreThemeSetting($store->id, $store->theme_dir);
}

if (empty($getStoreThemeSetting)) {
    $path = storage_path() . '/uploads/' . $store->theme_dir . '/' . $store->theme_dir . '.json';
    $getStoreThemeSetting = json_decode(file_get_contents($path), true);
}

    $imgpath=\App\Models\Utility::get_file('uploads/');
    $s_logo = \App\Models\Utility::get_file('uploads/store_logo/');
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?php echo e(ucfirst(env('APP_NAME'))); ?> - <?php echo e(ucfirst($store->tagline)); ?>">
    <meta name="keywords" content="<?php echo e($store->metakeyword); ?>">
    <meta name="description" content="<?php echo e($store->metadesc); ?>">

    <title><?php echo $__env->yieldContent('page-title'); ?> - <?php echo e($store->tagline ? $store->tagline : config('APP_NAME', ucfirst($store->name))); ?>

    </title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="icon" href="<?php echo e(asset(Storage::url('uploads/logo/') . (!empty($setting->value) ? $setting->value : 'favicon.png'))); ?>" type="image/png">
    <link rel="stylesheet" href="<?php echo e(asset('assets/theme4/fonts/fontawesome-free/css/all.min.css')); ?>">
    <?php if(isset($data->value) && $data->value == 'on'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/theme4/css/rtl-main-style.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('assets/theme4/css/rtl-responsive.css')); ?>">
    <?php else: ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/theme4/css/main-style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/theme4/css/responsive.css')); ?>">
    <?php endif; ?>

                
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="mobile-wep-app-capable" content="yes">
    <meta name="apple-mobile-wep-app-capable" content="yes">
    <meta name="msapplication-starturl" content="/">
    <link rel="apple-touch-icon" href="<?php echo e(asset(Storage::url('uploads/logo/') . (!empty($setting->value) ? $setting->value : 'favicon.png'))); ?>" />
    <?php if($store->enable_pwa_store == 'on'): ?>
        <link rel="manifest" href="<?php echo e(asset('storage/uploads/customer_app/store_'.$store->id.'/manifest.json')); ?>" />
    <?php endif; ?>
    <?php if(!empty( $store->pwa_store($store->slug)->theme_color)): ?>

        <meta name="theme-color" content="<?php echo e($store->pwa_store($store->slug)->theme_color); ?>" />
    <?php endif; ?>
    <?php if(!empty( $store->pwa_store($store->slug)->background_color)): ?>
        <meta name="apple-mobile-web-app-status-bar" content="<?php echo e($store->pwa_store($store->slug)->background_color); ?>" />
    <?php endif; ?>

    <?php echo $__env->yieldPushContent('css-page'); ?>
</head>

<body class="<?php echo e(!empty($themeClass)? $themeClass : 'theme4-v1'); ?>">
    <?php
        if (!empty(session()->get('lang'))) {
            $currantLang = session()->get('lang');
        } else {
            $currantLang = $store->lang;
        }

        $languages = \App\Models\Utility::languages();
        $storethemesetting = \App\Models\Utility::demoStoreThemeSetting($store->id, $store->theme_dir);
    ?>

    <header class="site-header">
        <div class="container">
            <div class="main-navigationbar">
                <div class="logo-col">
                    <a href="<?php echo e(route('store.slug', $store->slug)); ?>">
                        <img src="<?php echo e($s_logo . (!empty($store->logo) ? $store->logo : 'logo.png')); ?>" alt="">
                    </a>
                </div>
                <div class="main-nav">
                    <ul>
                        <li class="menu-link">
                            <a class="<?php echo e(route('store.slug') ?: 'text-dark'); ?> <?php echo e(Request::segment(1) == 'store-blog' ? 'text-dark' : ''); ?>" href="<?php echo e(route('store.slug', $store->slug)); ?>"><?php echo e(ucfirst($store->name)); ?></a>
                        </li>
                        <?php if(!empty($page_slug_urls)): ?>
                            <?php $__currentLoopData = $page_slug_urls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $page_slug_url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($page_slug_url->enable_page_header == 'on'): ?>
                                    <li class="menu-link">
                                        <a href="<?php echo e(env('APP_URL') . 'page/' . $page_slug_url->slug); ?>"><?php echo e(ucfirst($page_slug_url->name)); ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        <?php if($store['blog_enable'] == 'on' && !empty($blog)): ?>
                            <li class="menu-link">
                                <a href="<?php echo e(route('store.blog', $store->slug)); ?>"><?php echo e(__('Blog')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="right-menu">
                    <ul>
                        <li class="search-header">
                            <a href="#"><i class="fas fa-search"></i></a>
                        </li>
                        <?php if(Utility::CustomerAuthCheck($store->slug) == true): ?>
                            <li>
                                <a href="<?php echo e(route('store.wishlist', $store->slug)); ?>"><i class="fas fa-heart"></i></a>
                                <span class="count wishlist_count"><?php echo e(!empty($wishlist) ? count($wishlist) : '0'); ?></span>
                            </li>
                        <?php endif; ?>
                        <li>
                            <a href="<?php echo e(route('store.cart', $store->slug)); ?>">
                                <i class="fas fa-shopping-basket"></i>
                                <div class="count" id="shoping_counts"><?php echo e(!empty($total_item) ? $total_item : '0'); ?></div>
                            </a>
                        </li>
                        <li class="language-header set has-children has-item">
                            <a href="#" class="acnav-label">
                                <?php echo e(Str::upper($currantLang)); ?>

                            </a>
                            <div class="menu-dropdown acnav-list">
                                <ul>
                                    <li>
                                        <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><a class="<?php if($language == $currantLang): ?> active-language text-primary <?php endif; ?>" href="<?php echo e(route('change.languagestore', [$store->slug, $language])); ?>"><?php echo e(Str::upper($language)); ?></a></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="shoping-btn">
                            <a href="<?php echo e(route('store.categorie.product', [$store->slug, 'Start shopping'])); ?>">
                               <?php echo e(__(' Start shopping')); ?>

                                <i class="fas fa-shopping-basket"></i>
                        </li>
                        <?php if(Utility::CustomerAuthCheck($store->slug) == true): ?>
                            <li class="profile-header set has-children has-item">
                                <a href="javascript:void(0)" class="acnav-label">
                                    <span class="login-text" style="display: block;"><?php echo e(ucFirst(Auth::guard('customers')->user()->name)); ?></span>
                                </a>
                                <div class="menu-dropdown acnav-list">
                                    <ul>
                                        <li>
                                            <a href="<?php echo e(route('store.slug', $store->slug)); ?>"><?php echo e(__('My Dashboard')); ?></a>
                                        </li>
                                        <li>
                                            <a href="#" data-size="lg" data-url="<?php echo e(route('customer.profile', [$store->slug, \Illuminate\Support\Facades\Crypt::encrypt(Auth::guard('customers')->user()->id)])); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Edit Profile')); ?>" data-toggle="modal"><?php echo e(__('My Profile')); ?></a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e(route('customer.home', $store->slug)); ?>"> <?php echo e(__('My Orders')); ?></a>
                                        </li>
                                        <li>
                                            <?php if(Utility::CustomerAuthCheck($store->slug) == false): ?>
                                                <a href="<?php echo e(route('customer.login', $store->slug)); ?>">
                                                    <?php echo e(__('Sign in')); ?>

                                                </a>
                                            <?php else: ?>
                                                <a href="#" onclick="event.preventDefault(); document.getElementById('customer-frm-logout').submit();"><?php echo e(__('Logout')); ?></a>
                                                <form id="customer-frm-logout"
                                                    action="<?php echo e(route('customer.logout', $store->slug)); ?>"
                                                    method="POST" class="d-none">
                                                    <?php echo e(csrf_field()); ?>

                                                </form>
                                            <?php endif; ?>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        <?php else: ?>
                            <li class="profile-header set has-children has-item">
                                <a href="<?php echo e(route('customer.login', $store->slug)); ?>" class="acnav-label"><span class="login-text"><?php echo e(__('Log in')); ?></span></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="mobile-menu mobile-only">
                    <button class="mobile-menu-button" id="menu">
                        <div class="one"></div>
                        <div class="two"></div>
                        <div class="three"></div>
                    </button>
                </div>
            </div>
            <div class="mobile-menu-bottom">
                <ul>
                    <?php if(Utility::CustomerAuthCheck($store->slug) == true): ?>
                        <li class="profile-header-2 set has-children has-item">
                            <a href="javascript:void(0)" class="acnav-label">
                                <span class="login-text" style="display: block;"><?php echo e(ucFirst(Auth::guard('customers')->user()->name)); ?></span>
                            </a>
                            <div class="menu-dropdown acnav-list">
                                <ul>
                                    <li>
                                        <a href="<?php echo e(route('store.slug', $store->slug)); ?>"><?php echo e(__('My Dashboard')); ?></a>
                                    </li>
                                    <li>
                                        <a href="#" data-size="lg" data-url="<?php echo e(route('customer.profile', [$store->slug, \Illuminate\Support\Facades\Crypt::encrypt(Auth::guard('customers')->user()->id)])); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Edit Profile')); ?>" data-toggle="modal"><?php echo e(__('My Profile')); ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('customer.home', $store->slug)); ?>"><?php echo e(__('My Orders')); ?></a>
                                    </li>
                                    <li>
                                        <?php if(Utility::CustomerAuthCheck($store->slug) == false): ?>
                                            <a href="<?php echo e(route('customer.login', $store->slug)); ?>"> <?php echo e(__('Sign in')); ?></a>
                                        <?php else: ?>
                                            <a href="#" onclick="event.preventDefault(); document.getElementById('customer-frm-logout').submit();"><?php echo e(__('Logout')); ?></a>
                                            <form id="customer-frm-logout"
                                                action="<?php echo e(route('customer.logout', $store->slug)); ?>"
                                                method="POST" class="d-none">
                                                <?php echo e(csrf_field()); ?>

                                            </form>
                                        <?php endif; ?>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    <?php else: ?>
                        <li class="profile-header-2">
                            <a href="<?php echo e(route('customer.login', $store->slug)); ?>"><?php echo e(__('Log in')); ?></a>
                        </li>
                    <?php endif; ?>
                    <li class="language-header-2 set has-children has-item">
                        <a href="javascript:void(0)" class="acnav-label">
                            <span class="select"><?php echo e(Str::upper($currantLang)); ?></span>
                        </a>
                        <div class="menu-dropdown acnav-list">
                            <ul>
                                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php echo e(route('change.languagestore', [$store->slug, $language])); ?>" class="<?php if($language == $currantLang): ?> active-language text-primary <?php endif; ?>"><?php echo e(Str::upper($language)); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <?php echo $__env->yieldContent('content'); ?>

    <footer class="footer">
        <div class="container">
            <div class="row footer-top">
                <div class="col-12 footer-link-1">
                    <?php if($getStoreThemeSetting[8]['section_enable'] == 'on'): ?>
                        <h2>
                            <a href="<?php echo e(route('store.slug', $store->slug)); ?>">
                                <?php if(!empty($getStoreThemeSetting[8])): ?>
                                    <img src="<?php echo e($imgpath. $getStoreThemeSetting[8]['inner-list'][0]['field_default_text']); ?>">
                                <?php endif; ?>
                            </a>
                        </h2>
                    <?php endif; ?>
                    <?php if($getStoreThemeSetting[17]['section_enable'] == 'on'): ?>
                        <ul class="social-link">
                            <?php if(isset($getStoreThemeSetting[17]['homepage-footer-2-social-icon']) || isset($getStoreThemeSetting[17]['homepage-footer-2-social-link'])): ?>
                                <?php if(isset($getStoreThemeSetting[17]['inner-list'][1]['field_default_text']) && isset($getStoreThemeSetting[17]['inner-list'][0]['field_default_text'])): ?>
                                    <?php $__currentLoopData = $getStoreThemeSetting[17]['homepage-footer-2-social-icon']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $icon_key => $storethemesettingicon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $__currentLoopData = $getStoreThemeSetting[17]['homepage-footer-2-social-link']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link_key => $storethemesettinglink): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($icon_key == $link_key): ?>
                                                <li>
                                                    <a href="<?php echo e($storethemesettinglink); ?>" target="_blank">
                                                        <?php echo $storethemesettingicon; ?>

                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            <?php else: ?>
                                <?php for($i = 0; $i < $getStoreThemeSetting[17]['loop_number']; $i++): ?>
                                    <?php if(isset($getStoreThemeSetting[17]['inner-list'][1]['field_default_text']) && isset($getStoreThemeSetting[17]['inner-list'][0]['field_default_text'])): ?>
                                        <li>
                                            <a href="<?php echo e($getStoreThemeSetting[17]['inner-list'][1]['field_default_text']); ?>" target="_blank">
                                                <?php echo $getStoreThemeSetting[17]['inner-list'][0]['field_default_text']; ?>

                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            <?php endif; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row footer-bottom">
                <div class="col-12 footer-link-2 text-center">
                    <?php if($getStoreThemeSetting[8]['section_enable'] == 'on'): ?>
                        <ul>
                            <?php if(!empty($getStoreThemeSetting[9]['inner-list'][0]['field_default_text']) && $getStoreThemeSetting[9]['inner-list'][0]['field_default_text'] == 'on'): ?>
                                <?php if(isset($getStoreThemeSetting[10]['homepage-header-quick-link-name-1']) || isset($getStoreThemeSetting[10]['homepage-header-quick-link-1'])): ?>
                                    <li>
                                        <a href="<?php echo e($getStoreThemeSetting[10]['homepage-header-quick-link-1'][0]); ?>"> <?php echo e($getStoreThemeSetting[10]['homepage-header-quick-link-name-1'][0]); ?></a>
                                    </li>
                                <?php else: ?>
                                    <li>
                                        <a href="<?php echo e($getStoreThemeSetting[10]['inner-list'][1]['field_default_text']); ?>"><?php echo e($getStoreThemeSetting[10]['inner-list'][0]['field_default_text']); ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if(!empty($getStoreThemeSetting[11]['inner-list'][0]['field_default_text']) && $getStoreThemeSetting[11]['inner-list'][0]['field_default_text'] == 'on'): ?>
                                <?php if(isset($getStoreThemeSetting[12]['homepage-header-quick-link-name-2']) || isset($getStoreThemeSetting[12]['homepage-header-quick-link-2'])): ?>
                                    <li>
                                        <a href="<?php echo e($getStoreThemeSetting[12]['homepage-header-quick-link-2'][0]); ?>"> <?php echo e($getStoreThemeSetting[12]['homepage-header-quick-link-name-2'][0]); ?></a>
                                    </li>
                                <?php else: ?>
                                <li>
                                    <a href="<?php echo e($getStoreThemeSetting[12]['inner-list'][1]['field_default_text']); ?>"><?php echo e($getStoreThemeSetting[12]['inner-list'][0]['field_default_text']); ?></a>
                                </li>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if(!empty($getStoreThemeSetting[13]['inner-list'][0]['field_default_text']) && $getStoreThemeSetting[13]['inner-list'][0]['field_default_text'] == 'on'): ?>
                                <?php if(isset($getStoreThemeSetting[14]['homepage-header-quick-link-name-3']) || isset($getStoreThemeSetting[14]['homepage-header-quick-link-3'])): ?>
                                    <li>
                                        <a href="<?php echo e($getStoreThemeSetting[14]['homepage-header-quick-link-3'][0]); ?>"> <?php echo e($getStoreThemeSetting[14]['homepage-header-quick-link-name-3'][0]); ?></a>
                                    </li>
                                <?php else: ?>
                                    <li>
                                        <a href="<?php echo e($getStoreThemeSetting[14]['inner-list'][1]['field_default_text']); ?>"><?php echo e($getStoreThemeSetting[14]['inner-list'][0]['field_default_text']); ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if(!empty($getStoreThemeSetting[15]['inner-list'][0]['field_default_text']) && $getStoreThemeSetting[15]['inner-list'][0]['field_default_text'] == 'on'): ?>
                            <?php if(isset($getStoreThemeSetting[16]['homepage-header-quick-link-name-4']) || isset($getStoreThemeSetting[16]['homepage-header-quick-link-4'])): ?>
                                <li>
                                    <a href="<?php echo e($getStoreThemeSetting[16]['homepage-header-quick-link-4'][0]); ?>"><?php echo e($getStoreThemeSetting[16]['homepage-header-quick-link-name-4'][0]); ?></a>
                                </li>
                            <?php else: ?>
                                <li>
                                    <a href="<?php echo e($getStoreThemeSetting[16]['inner-list'][1]['field_default_text']); ?>"><?php echo e($getStoreThemeSetting[16]['inner-list'][0]['field_default_text']); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>
                        </ul>
                    <?php endif; ?>
                    <?php if($getStoreThemeSetting[17]['section_enable'] == 'on'): ?>
                        <P> <?php echo e($getStoreThemeSetting[18]['inner-list'][0]['field_default_text']); ?></P>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </footer>
    <?php if($getStoreThemeSetting[17]['section_enable'] == 'on'): ?>
        <script>
            <?php echo $getStoreThemeSetting[18]['inner-list'][1]['field_default_text']; ?>

        </script>
    <?php endif; ?>
    <div class="mobile-menu-wrapper">
        <div class="menu-close-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" viewBox="0 0 20 18">
                <path fill="#24272a" d="M19.95 16.75l-.05-.4-1.2-1-5.2-4.2c-.1-.05-.3-.2-.6-.5l-.7-.55c-.15-.1-.5-.45-1-1.1l-.1-.1c.2-.15.4-.35.6-.55l1.95-1.85 1.1-1c1-1 1.7-1.65 2.1-1.9l.5-.35c.4-.25.65-.45.75-.45.2-.15.45-.35.65-.6s.3-.5.3-.7l-.3-.65c-.55.2-1.2.65-2.05 1.35-.85.75-1.65 1.55-2.5 2.5-.8.9-1.6 1.65-2.4 2.3-.8.65-1.4.95-1.9 1-.15 0-1.5-1.05-4.1-3.2C3.1 2.6 1.45 1.2.7.55L.45.1c-.1.05-.2.15-.3.3C.05.55 0 .7 0 .85l.05.35.05.4 1.2 1 5.2 4.15c.1.05.3.2.6.5l.7.6c.15.1.5.45 1 1.1l.1.1c-.2.15-.4.35-.6.55l-1.95 1.85-1.1 1c-1 1-1.7 1.65-2.1 1.9l-.5.35c-.4.25-.65.45-.75.45-.25.15-.45.35-.65.6-.15.3-.25.55-.25.75l.3.65c.55-.2 1.2-.65 2.05-1.35.85-.75 1.65-1.55 2.5-2.5.8-.9 1.6-1.65 2.4-2.3.8-.65 1.4-.95 1.9-1 .15 0 1.5 1.05 4.1 3.2 2.6 2.15 4.3 3.55 5.05 4.2l.2.45c.1-.05.2-.15.3-.3.1-.15.15-.3.15-.45z">
                </path>
            </svg>
        </div>
        <div class="mobile-menu-bar">
            <ul>
                <li class="menu-lnk">
                    <a href="<?php echo e(route('store.slug', $store->slug)); ?>"><?php echo e(ucfirst($store->name)); ?></a>
                </li>
                <?php if(!empty($page_slug_urls)): ?>
                    <?php $__currentLoopData = $page_slug_urls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $page_slug_url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($page_slug_url->enable_page_header == 'on'): ?>
                            <li class="menu-lnk">
                                <a href="<?php echo e(env('APP_URL') . 'page/' . $page_slug_url->slug); ?>"><?php echo e(ucfirst($page_slug_url->name)); ?></a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <?php if($store['blog_enable'] == 'on' && !empty($blog)): ?>
                    <li class="menu-lnk">
                        <a href="<?php echo e(route('store.blog', $store->slug)); ?>"><?php echo e(__('Blog')); ?></a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
    <div id="omnisearch" class="omnisearch">
        <div class="serch-close-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" viewBox="0 0 20 18">
                <path fill="#24272a" d="M19.95 16.75l-.05-.4-1.2-1-5.2-4.2c-.1-.05-.3-.2-.6-.5l-.7-.55c-.15-.1-.5-.45-1-1.1l-.1-.1c.2-.15.4-.35.6-.55l1.95-1.85 1.1-1c1-1 1.7-1.65 2.1-1.9l.5-.35c.4-.25.65-.45.75-.45.2-.15.45-.35.65-.6s.3-.5.3-.7l-.3-.65c-.55.2-1.2.65-2.05 1.35-.85.75-1.65 1.55-2.5 2.5-.8.9-1.6 1.65-2.4 2.3-.8.65-1.4.95-1.9 1-.15 0-1.5-1.05-4.1-3.2C3.1 2.6 1.45 1.2.7.55L.45.1c-.1.05-.2.15-.3.3C.05.55 0 .7 0 .85l.05.35.05.4 1.2 1 5.2 4.15c.1.05.3.2.6.5l.7.6c.15.1.5.45 1 1.1l.1.1c-.2.15-.4.35-.6.55l-1.95 1.85-1.1 1c-1 1-1.7 1.65-2.1 1.9l-.5.35c-.4.25-.65.45-.75.45-.25.15-.45.35-.65.6-.15.3-.25.55-.25.75l.3.65c.55-.2 1.2-.65 2.05-1.35.85-.75 1.65-1.55 2.5-2.5.8-.9 1.6-1.65 2.4-2.3.8-.65 1.4-.95 1.9-1 .15 0 1.5 1.05 4.1 3.2 2.6 2.15 4.3 3.55 5.05 4.2l.2.45c.1-.05.2-.15.3-.3.1-.15.15-.3.15-.45z">
                </path>
            </svg>
        </div>
        <div class="container">
            <!-- Search form -->
            <form class="omnisearch-form"  action="<?php echo e(route('store.categorie.product', [$store->slug, 'Start shopping'])); ?>" method="get">
            <?php echo csrf_field(); ?>
                <div class="form-group focused">
                    <div class="input-group input-group-merge input-group-flush">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                        <input type="text" name="search_data" class="form-control form-control-flush" placeholder="Type your product...">

                    </div>
                </div>
            </form>
        </div>
    </div>
     <div class="overlay"></div>
    <div class="overlay"></div>
    <div class="modal fade modal-popup" id="commonModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-inner lg-dialog" role="document">
            <div class="modal-content">
                <div class="popup-content">
                    <div class="modal-header  popup-header align-items-center">
                        <div class="modal-title">
                            <h6 class="mb-0" id="modelCommanModelLabel"></h6>
                        </div>
                        <button type="button" class="close close-button" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    </div>
                </div>

            </div>
        </div>
    </div>   
    
    <div class="modal fade" id="Checkout">
        <div class="modal-dialog modal-md rounded-pill ">
            <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(__('Checkout As Guest Or Login')); ?></h5>
                <button type="button" class="close-button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="checkout-popup">
                <a href="<?php echo e(route('customer.login', $store->slug)); ?>" class="cart-btn"><?php echo e(__('Countinue to sign in')); ?></a>
                <a href="<?php echo e(route('user-address.useraddress', $store->slug)); ?>" class="cart-btn"><?php echo e(__('Countinue as guest')); ?></a>
            </div>
            </div>
        </div>
    </div>

    <script src="<?php echo e(asset('custom/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('custom/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/theme4/js/slick.min.js')); ?>" defer="defer"></script>
    <script src="<?php echo e(asset('custom/libs/bootstrap-notify/bootstrap-notify.min.js')); ?>"></script>
    <?php if($store->enable_pwa_store == 'on'): ?>
        <script type="text/javascript">

        const container = document.querySelector("body")

        const coffees = [];

        if ("serviceWorker" in navigator) {

            window.addEventListener("load", function() {
                navigator.serviceWorker
                    .register( "<?php echo e(asset("serviceWorker.js")); ?>" )
                    .then(res => console.log(""))
                    .catch(err => console.log("service worker not registered", err))

            })
        }

        </script>
    <?php endif; ?>
    <?php if(isset($data->value) && $data->value == 'on'): ?>
        <script src="<?php echo e(asset('assets/theme4/js/rtl-custom.js')); ?>" defer="defer"></script>
    <?php else: ?>
        <script src="<?php echo e(asset('assets/theme4/js/custom.js')); ?>" defer="defer"></script>
    <?php endif; ?>
    <script>
        var dataTabelLang = {
            paginate: {
                previous: "<?php echo e('Previous'); ?>",
                next: "<?php echo e('Next'); ?>"
            },
            lengthMenu: "<?php echo e('Show'); ?> MENU <?php echo e('entries'); ?>",
            zeroRecords: "<?php echo e('No data available in table'); ?>",
            info: "<?php echo e('Showing'); ?> START <?php echo e('to'); ?> END <?php echo e('of'); ?> TOTAL <?php echo e('entries'); ?>",
            infoEmpty: " ",
            search: "<?php echo e('Search:'); ?>"
        }
    </script>
    <script src="<?php echo e(asset('custom/js/custom.js')); ?>"></script>


    <?php if(App\Models\Utility::getValByName('gdpr_cookie') == 'on'): ?>
        <script type="text/javascript">
            var defaults = {
                'messageLocales': {
                    /*'en': 'We use cookies to make sure you can have the best experience on our website. If you continue to use this site we assume that you will be happy with it.'*/
                    'en': "<?php echo e(App\Models\Utility::getValByName('cookie_text')); ?>"
                },
                'buttonLocales': {
                    'en': 'Ok'
                },
                'cookieNoticePosition': 'bottom',
                'learnMoreLinkEnabled': false,
                'learnMoreLinkHref': '/cookie-banner-information.html',
                'learnMoreLinkText': {
                    'it': 'Saperne di più',
                    'en': 'Learn more',
                    'de': 'Mehr erfahren',
                    'fr': 'En savoir plus'
                },
                'buttonLocales': {
                    'en': 'Ok'
                },
                'expiresIn': 30,
                'buttonBgColor': '#d35400',
                'buttonTextColor': '#fff',
                'noticeBgColor': '#000',
                'noticeTextColor': '#fff',
                'linkColor': '#009fdd'
            };
        </script>
        <script src="<?php echo e(asset('custom/js/cookie.notice.js')); ?>"></script>
    <?php endif; ?>

    <?php echo $__env->yieldPushContent('script-page'); ?>
    <?php if(Session::has('success')): ?>
        <script>
            show_toastr('<?php echo e(__('Success')); ?>', '<?php echo session('success'); ?>', 'success');
        </script>
        <?php echo e(Session::forget('success')); ?>

    <?php endif; ?>
    <?php if(Session::has('error')): ?>
        <script>
            show_toastr('<?php echo e(__('Error')); ?>', '<?php echo session('error'); ?>', 'error');
        </script>
        <?php echo e(Session::forget('error')); ?>

    <?php endif; ?>
    <?php
        $store_settings = \App\Models\Store::where('slug', $store->slug)->first();
    ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo e($store_settings->google_analytic); ?>"></script>

    <?php echo $store_settings->storejs; ?>


    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', '<?php echo e($store_settings->google_analytic); ?>');
    </script>

    <!-- Facebook Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '<?php echo e($store_settings->fbpixel_code); ?>');
        fbq('track', 'PageView');
    </script>

    <script type="text/javascript">
        $(function() {
            $(".drop-down__button ").on("click", function(e) {
                $(".drop-down").addClass("drop-down--active");
                e.stopPropagation()
            });
            $(document).on("click", function(e) {
                if ($(e.target).is(".drop-down") === false) {
                    $(".drop-down").removeClass("drop-down--active");
                }
            });
        });
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=0000&ev=PageView&noscript=<?php echo e($store_settings->fbpixel_code); ?>" /></noscript>

</body>

</html>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/storelancer_new/resources/views/storefront/layout/theme4.blade.php ENDPATH**/ ?>