@php
    $currantLang = $users->currentLanguages();
    $profile=\App\Models\Utility::get_file('uploads/profile/');
    if ($currantLang == null)
    {
    $currantLang = "en";
    }
@endphp
<!-- [ Header ] start -->
    @if (isset($setting['cust_theme_bg']) && $setting['cust_theme_bg'] == 'on')
    <header class="dash-header transprent-bg">
    @else
    <header class="dash-header">
    @endif
        <div class="header-wrapper">
            <div class="me-auto dash-mob-drp">
                <ul class="list-unstyled">
                    <li class="dash-h-item mob-hamburger">
                        <a href="#!" class="dash-head-link" id="mobile-collapse">
                            <div class="hamburger hamburger--arrowturn">
                                <div class="hamburger-box">
                                    <div class="hamburger-inner"></div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="dropdown dash-h-item drp-company">
                        <a class="dash-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#"
                            role="button" aria-haspopup="false" aria-expanded="false">
                            <span class="theme-avtar">
                                <img class="theme-avtar" alt="#" style="width:30px;" src="{{ !empty($users->avatar) ? $profile . '/' . $users->avatar : $profile . '/avatar.png' }}">
                            </span>
                            <span class="hide-mob ms-2">{{ Auth::user()->name }}</span>
                            <i class="ti ti-chevron-down drp-arrow nocolor hide-mob"></i>
                        </a>
                        <div class="dropdown-menu dash-h-dropdown">
                            @if (Auth::user()->type == 'Owner')
                                @foreach(Auth::user()->stores as $store)
                                    @if ($store->is_active)
                                        <a href="@if (Auth::user()->current_store == $store->id) # @else {{ route('change_store', $store->id) }} @endif" class="dropdown-item">
                                            @if (Auth::user()->current_store == $store->id)
                                                <i class="ti ti-checks text-primary"></i>
                                            @endif
                                            <span>{{ $store->name }}</span>
                                        </a>
                                    @else
                                        <a href="#!" class="dropdown-item">
                                            <i class="ti ti-lock"></i>
                                            <span>{{ $store->name }}</span>
                                            @if (isset($store->pivot->permission))
                                                @if ($store->pivot->permission == 'Owner')
                                                    <span class="badge bg-dark">{{ __($store->pivot->permission) }}</span>
                                                @else
                                                    <span class="badge bg-dark">{{ __('Shared') }}</span>
                                                @endif
                                            @endif 
                                        </a>
                                    @endif
                                @endforeach
                                <hr class="dropdown-divider" />
                                @auth('web')
                                    @if (Auth::user()->type == 'Owner')
                                        <a href="#!" class="dropdown-item" data-size="lg" data-url="{{ route('store-resource.create') }}" data-ajax-popup="true" data-title="{{ __('Create New Store') }}">
                                            <i class="ti ti-circle-plus"></i>
                                            <span>{{ __('Create New Store') }}</span>
                                        </a>
                                    @endif
                                @endauth
                                <hr class="dropdown-divider" />
                            @endif
                            <a href="{{ route('profile') }}" class="dropdown-item">
                                <i class="ti ti-user"></i>
                                <span>{{ __('My Profile') }}</span>
                            </a>
                            <a href="{{ route('logout') }}" class="dropdown-item"  onclick="event.preventDefault();document.getElementById('frm-logout').submit();">
                                <i class="ti ti-power"></i>
                                <span>{{ __('Logout') }}</span>
                            </a>
                            <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="ms-auto">
                <ul class="list-unstyled">
                    <li class="dropdown dash-h-item drp-language">
                        <a class="dash-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#"
                            role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="ti ti-world nocolor"></i>
                            <span class="drp-text">{{ Str::upper($currantLang) }}</span>
                            <i class="ti ti-chevron-down drp-arrow nocolor"></i>
                        </a>
                        <div class="dropdown-menu dash-h-dropdown dropdown-menu-end">
                            @foreach(App\Models\Utility::languages() as $lang)
                            
                                <a href="{{ route('change.language', $lang) }}" class="dropdown-item {{ $currantLang == $lang ? 'text-primary' : '' }}">
                                    <span>{{ Str::upper($lang) }}</span>
                                </a>
                            @endforeach
                            @if (Auth::user()->type == 'super admin')
                                <hr class="dropdown-divider" />
                                <a href="{{ route('manage.language', [$currantLang]) }}"
                                class="dropdown-item border-top py-1 text-primary">{{ __('Manage Languages') }}
                                </a>
                            @endif
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <!-- [ Header ] end -->