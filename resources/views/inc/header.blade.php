<!-- Marko Jovanovic 0635/2015 -->
<div class="header-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 no-padding-left-right">
                    <div class="logo">
                    <a href="">eCK</a>
                    </div>
                </div>
                <div class="col-md-4 search-area">
                    <!--  <div class="header-search"> -->
                    <ul class="nav d-inl-bl">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown header-left-flag">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"></a>
                            <ul class="dropdown-menu animated flipInX">
                                <li class="flag1"></li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 text-right">
                    <div class="header-right">
                        @guest
                            <ul class="nav d-inl-bl">
                                <!--
                                <li class="dropdown header-left-flag cta3" data-toggle="dropdown">
                                    <img src="{{ asset('assets/img/user-img.png') }}" alt="">
                                    <span class="user-id">Gost</span>
                                    <span><img src="{{ asset('assets/svg/arrow-down.svg') }}"></span>
                                    <ul class="dropdown-menu cta4 animated flipInX">
                                        <li>
                                            <ul class="menu">
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('login') }}">
                                                        {{ __('Login') }}
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('register') }}">
                                                        {{ __('Register') }}
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>-->
                            </ul>
                        @else
                        <ul class="nav d-inl-bl">
                            <!-- 
                            <li class="dropdown header-left-flag cta3" data-toggle="dropdown">
                                <img src="{{ asset('assets/img/user-img.png') }}" alt="">
                                <span class="user-id">{{ Auth::user()->ime }} {{ Auth::user()->prezime }}</span>
                                <span><img src="{{ asset('assets/svg/arrow-down.svg') }}"></span>
                                <ul class="dropdown-menu cta4 animated flipInX">
                                    <li class="flag1"></li>
                                    <li>
                                        <ul class="menu">
                                            <li>
                                                <a href="http://google.rs">
                                                    <div class="single-flag">
                                                        <span class="user-hv cta1" style="background: url(assets/img/user.png);"></span>
                                                        <div class="header-right-icon-text">
                                                            <p>Account</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();  document.getElementById('menu-logout-form').submit();">
                                                        <div class="single-flag cta5">
                                                            <span class="user-hv" style="background: url(assets/img/power.png);"></span>
                                                            <div class="header-right-icon-text">
                                                                <p>Logout</p>
                                                            </div>
                                                        </div>
                                                </a>

                                                <form id="menu-logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
                                    </li>-->
                                </ul>
                            </li>
                        </ul>
                        @endguest
                    </div>
                </div>
            </div>
            <div class="row">
                <span style="opacity: 0.0">Dropdown menu button</span>
            </div>
        </div>
    </div>