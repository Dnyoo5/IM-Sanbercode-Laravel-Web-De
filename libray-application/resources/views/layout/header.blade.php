<div class="landing-header" data-kt-sticky="true" data-kt-sticky-name="landing-header"
    data-kt-sticky-offset="{default: '200px', lg: '300px'}">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Wrapper-->
        <div class="d-flex align-items-center justify-content-between">
            <!--begin::Logo-->
            <div class="d-flex align-items-center flex-equal">
                <!--begin::Mobile menu toggle-->
                <button class="btn btn-icon btn-active-color-primary me-3 d-flex d-lg-none" id="kt_landing_menu_toggle">
                    <i class="ki-duotone ki-abstract-14 fs-2hx">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </button>
                <!--end::Mobile menu toggle-->
                <!--begin::Logo image-->
                <a href="/">
                   <h1 class="fs-2x"><span class="fw-bold" style="color: rgb(1, 74, 99)">Ruang</span>baca</h1>
                </a>
                <!--end::Logo image-->
            </div>
            <!--end::Logo-->
            <!--begin::Menu wrapper-->
            <div class="d-lg-block" id="kt_header_nav_wrapper">
                <div class="d-lg-block p-5 p-lg-0" data-kt-drawer="true" data-kt-drawer-name="landing-menu"
                    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                    data-kt-drawer-width="200px" data-kt-drawer-direction="start"
                    data-kt-drawer-toggle="#kt_landing_menu_toggle" data-kt-swapper="true"
                    data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav_wrapper'}">

                    <!--begin::Menu-->
                    <div class="menu menu-column flex-nowrap menu-rounded menu-lg-row menu-title-gray-600 menu-state-title-primary nav nav-flush fs-5 fw-semibold"
                        id="kt_landing_menu">

                        @auth
                            @if (auth()->user()->role === 'admin')
                                <div class="menu-item">
                                    <a class="menu-link nav-link py-3 px-4 px-xxl-6"
                                        href="{{ route('admin.dashboard.index') }}">Dashboard</a>
                                </div>
                            @endif
                        @endauth


                        <div class="menu-item">
                            <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="{{ route('home.index') }}">Home</a>
                        </div>

                        <div class="menu-item">
                            @php
                                $route = route('genres.index');
                                if (auth()->check() && auth()->user()->role === 'admin') {
                                    $route = route('admin.genres.index');
                                }
                            @endphp

                            <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="{{ $route }}">Genres</a>
                        </div>


                        <div class="menu-item">
                             @php
                                $route = route('books.index');
                                if (auth()->check() && auth()->user()->role === 'admin') {
                                    $route = route('admin.books.index');
                                }
                            @endphp
                            <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="{{ $route }}">Books</a>
                        </div>

                        @auth
                            @if (auth()->user()->role === 'admin')
                                <div class="menu-item">
                                    <a class="menu-link nav-link py-3 px-4 px-xxl-6"
                                        href="{{ route('admin.users.index') }}">Manage User</a>
                                </div>
                            @endif
                        @endauth

                    </div>


                    <!--end::Menu-->
                </div>
            </div>


            @auth
                <div class="d-flex align-items-center ms-3 ms-lg-4" id="kt_header_user_menu_toggle">
                    <div class="btn btn-icon btn-color-gray-700 btn-active-color-primary btn-outline btn-active-bg-light w-30px h-30px w-lg-40px h-lg-40px"
                        data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                        <i class="ki-duotone ki-user fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>

                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                        data-kt-menu="true">
                        <div class="menu-item px-5">
                            <div class="menu-content d-flex align-items-center px-5">

                                <div class="d-flex flex-column">
                                    <div class="fw-bold d-flex align-items-center fs-5">
                                        {{ Auth::user()->name }}
                                    </div>
                                    <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">
                                        {{ Auth::user()->email }}
                                    </a>
                                </div>

                            </div>
                        </div>
                        <div class="separator my-2"></div>
                        <div class="menu-item px-5">
                            <a href="{{ route('profile.show') }}" class="menu-link px-5">My Profile</a>
                        </div>
                        <div class="menu-item px-5 my-1">
                            <a href="{{ route('profile.edit') }}" class="menu-link px-5">Account Settings</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5">
                            <a href="#" class="menu-link px-5" onclick="confirmLogout(event)">Sign Out</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::User account menu-->
                    <!--end::Menu wrapper-->
                </div>
            @endauth
            @guest
                <div class="flex-equal text-end ms-1">
                    <a href="{{ route('login.show') }}" class="btn btn-success">Sign In</a>
                    <a href="{{ route('register.show') }}" class="btn btn-primary">Register</a>
                </div>
            @endguest

            <!--end::Toolbar-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Container-->
</div>
