<div id="sticky-header" class="hendre_nav_manu two">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-2">
                <div class="logo">
                    <a class="logo_img" href="index.html" title="hendre">
                        <img src="{{asset('assets/images/Artboard1.png')}}" alt="logo" height="60px">
                    </a>
                    <a class="main_sticky" href="index.html" title="hendre">
                        <img src="{{asset('assets/images/Artboard1.png')}}" alt="logo" height="60px">
                    </a>
                </div>
            </div>
            <div class="col-lg-7">
                <nav class="hendre_menu">
                    <ul class="nav_scroll">
                        <li><a href="{{route('home')}}">Home </a></li>
                        <li><a href="{{route('services')}}">Services</a></li>
                        <li><a href="{{('')}}">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header-src-box">
                    <div class="sidebar-btn style_two">
                        <div class="nav-btn navSidebar-button style_two"><span><i class="bi bi-filter-left"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  Mobile Menu Area -->
<div class="mobile-menu-area sticky d-sm-block d-md-block d-lg-none ">
    <div class="mobile-menu">
        <nav class="hendre_menu">
            <ul class="nav_scroll">
                <li><a href="{{route('home')}}">Home </a></li>
                <li><a href="{{route('services')}}">Services</a>
                </li>
                <li><a href="">Contact</a></li>
            </ul>
        </nav>
    </div>
</div>
