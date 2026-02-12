<!-- Header Two Start -->
<div class="header__two">
    <!-- Top Bar Area Start -->
    <div class="header__two-top-bar">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="header__two-top-bar-left">
                        <ul>
                            <li><a href="mailto:info@asaancredit.com"><i class="far fa-envelope"></i>info@asaancredit.com</a></li>
                            <li><a href="tel:+9779848715050"><i class="far fa-phone-alt"></i>+977 9848 71 5050</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="header__two-top-bar-right">
                        <ul>
                            <li><a href="#"><span><strong></strong></span></a></li>
                            <li><a href="#"><span>Where Investors & Entrepreneurs Grow Together</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Bar Area End -->
    <!-- Menu Bar Area Start -->
    <div class="header__two-menu-bar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-3">
                    <div class="header__two-menu-bar-logo">
                        <a href="index"><img src="{{asset('assets/img/logo-1.png')}}" alt=""></a>
                        <div class="responsive-menu"></div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7">
                    <div class="header__area-menu-bar-main-menu header__two-menu-bar-main-menu header-meanmenu">
                        <ul id="mobilemenu">
                            <li class="{!! request()->is('index')?'active':'' !!}"><a href="index" wire:navigate>Home</a></li>
                            <li class="{!! request()->is('about')?'active':'' !!}"><a href="about" wire:navigate>About</a></li>
                            <li class="{!! request()->is('service')?'active':'' !!}"><a href="service" wire:navigate>Service</a></li>
                            {{-- <li class="{!! request()->is('investor-marketplace')?'active':'' !!}"><a href="investor-marketplace" wire:navigate>Investment</a></li> --}}
                            <li class="{!! request()->is('contact')?'active':'' !!}"><a href="contact" wire:navigate>Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2">
                    <div class="header__two-menu-bar-right">
                        <a class="theme-btn3 btn5" href="/admin/login">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Menu Bar Area End -->
</div>
<!-- Header Two End -->

