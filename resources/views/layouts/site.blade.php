<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LaptopH</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ url('site') }}/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{ url('site') }}/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{ url('site') }}/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="{{ url('site') }}/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="{{ url('site') }}/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="{{ url('site') }}/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{ url('site') }}/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{ url('site') }}/css/style.css" type="text/css">
    <link rel="stylesheet" href="{{ url('comment') }}/style.css" type="text/css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

    @livewireStyles
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="{{ url('site') }}/img/logo2-removebg-preview.png" alt=""></a>
        </div>
        {{-- <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div> --}}
        <div class="humberger__menu__widget">
            {{-- <div class="header__top__right__language">
                <img src="{{ url('site') }}/img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div> --}}
            <div class="header__top__right__auth">
                @if (Auth::check())
                    <div class="header__top__right__language">
                        <div>T??i kho???n: {{ Auth::user()->name }}</div>
                        <span class="arrow_carrot-down"></span>
                        <ul>
                            <li><a href="{{ route('admin.getlogout') }}" class="dropdown-item">
                                    <i class="fa fa-sign-out" aria-hidden="true"></i> ????ng xu???t</a></li>
                        </ul>
                    </div>
                @else
                    <a href="{{ route('admin.getlogin') }}"><i class="fa fa-user"></i> ????ng
                        nh???p</a>
                    <a href="{{ route('register') }}"><i class="register"></i> ????ng k??</a>
                @endif
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                {{-- <li class="active"><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('shop') }}">Shop</a></li>
                <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="#">Shop Details</a></li>
                        <li><a href="{{ route('cart') }}">Shoping Cart</a></li>
                        <li><a href="{{ route('checkout') }}">Check Out</a></li>
                        <li><a href="./blog-details.html">Blog Details</a></li>
                    </ul>
                </li>
                <li><a href="./blog.html">Blog</a></li>
                <li><a href="./contact.html">Contact</a></li> --}}
                <li @class([
                    'active' => Route::currentRouteName() == 'home',
                ])><a href="{{ route('home') }}">TRANG CH???</a></li>
                <li @class([
                    'active' => Route::currentRouteName() == 'shop',
                ])><a href="{{ route('shop') }}">C???A H??NG</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="{{ route('shopsearch') }}">T??M KI???M</a></li>
                    </ul>
                </li>
                <li @class([
                    'active' => Route::currentRouteName() == 'contact',
                ])><a href="{{ route('contact') }}">LI??N H???</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i>ha.nd185445@sis.hust.edu.vn</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-map-marker"></i>T??M C???A H??NG G???N NH???T</li>
                                <li><i class="fa fa-shield"></i>Tra c???u b???o h??nh</li>
                                <li><i class="fa fa-headphones"></i>G??p ??, khi???u n???i</li>
                                <li><i class="fa fa-bullhorn"></i>Tuy???n d???ng</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="header__top__right">
                            <div class="header__top__right__auth">
                                @if (Auth::check())
                                    <div class="header__top__right__language">
                                        <div>T??i kho???n: {{ Auth::user()->name }}</div>
                                        <span class="arrow_carrot-down"></span>
                                        <ul>
                                            <li><a href="{{ route('admin.getlogout') }}" class="dropdown-item">
                                                    <i class="fa fa-sign-out" aria-hidden="true"></i> ????ng xu???t</a></li>
                                        </ul>
                                    </div>
                                @else
                                    <a href="{{ route('admin.getlogin') }}"><i class="fa fa-user"></i> ????ng
                                        nh???p</a>
                                    <a href="{{ route('register') }}"><i class="register"></i> ????ng k??</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{ route('shop') }}"><img src="{{ url('site') }}/img/logo2-removebg-preview.png"
                                style="width:90px; height:50px" alt="Logo"></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li @class([
                                'active' => Route::currentRouteName() == 'home',
                            ])><a href="{{ route('home') }}">TRANG CH???</a></li>
                            <li @class([
                                'active' => Route::currentRouteName() == 'shop',
                            ])><a href="{{ route('shop') }}">C???A H??NG</a>
                            </li>
                            {{-- <li @class([
                                'active' => Route::currentRouteName() == 'cart',
                            ])><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="#">Shop Details</a></li>
                                    <li><a href="{{ route('cart') }}">Shoping Cart</a></li>
                                    <li><a href="{{ route('checkout') }}">Check Out</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li> --}}
                            <li @class([
                                'active' => Route::currentRouteName() == 'contact',
                            ])><a href="{{ route('contact') }}">LI??N H???</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    @livewire('cart-counter')
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    @yield('content')

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="#"><img src="{{ url('site') }}/img/logo2-removebg-preview.png" alt="Logo"></a>
                        </div>
                        <ul>
                            <li>?????a ch???: Hai B?? Tr??ng, H?? N???i</li>
                            <li>Phone: 1900.1900</li>
                            <li>Email: ha.nd185445@sis.hust.edu.vn</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>GI???I THI???U LatopH</h6>
                        <ul>
                            <li><a href="#">Gi???i thi???u c??ng ty</a></li>
                            <li><a href="#">Li??n h??? h???p t??c kinh doanh</a></li>
                            <li><a href="#">Th??ng tin tuy???n d???ng</a></li>
                            <li><a href="#">Tin t???c</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>K??NH TH??NG TIN</h6>
                        <p>M???i b???n nh???p email ????? nh???n nh???ng th??ng tin khuy???n m???i m???i nh???t t??? LaptopH</p>
                        <form action="#">
                            <input type="text" placeholder="Nh???p email c???a b???n">
                            <button type="submit" class="site-btn">G???i</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text">
                            <p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | This template is made with <i
                                    class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com"
                                    target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                        <div class="footer__copyright__payment"><img src="{{ url('site') }}/img/payment-item.png"
                                alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{ url('site') }}/js/jquery-3.3.1.min.js"></script>
    <script src="{{ url('site') }}/js/bootstrap.min.js"></script>
    <script src="{{ url('site') }}/js/jquery.nice-select.min.js"></script>
    <script src="{{ url('site') }}/js/jquery-ui.min.js"></script>
    <script src="{{ url('site') }}/js/jquery.slicknav.js"></script>
    <script src="{{ url('site') }}/js/mixitup.min.js"></script>
    <script src="{{ url('site') }}/js/owl.carousel.min.js"></script>
    <script src="{{ url('site') }}/js/main.js"></script>
    <script src="{{ url('site') }}/js/easy-number-separator.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    <!-- The "defer" attribute is important to make sure Alpine waits for Livewire to load first. -->

    @stack('scripts')

</body>

</html>
