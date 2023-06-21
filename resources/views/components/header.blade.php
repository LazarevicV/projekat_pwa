<style>
    .prosiri_admin_menu {
        width: 100%;
        /* border: 1px solid red; */
        display: flex;
        justify-content: center;
        background-color: darkgray;
        margin-bottom: 2vh
    }

    .prosiri_admin_menu ul {
        width: 100%;
        display: flex;
        justify-content: space-around;
    }
</style>


<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="{{asset('images/logo/logo.png')}}" alt="logo"></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-shopping-cart"></i> <span></span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div>
        <div class="humberger__menu__widget">
            @if (session()->get('user'))
                <a href=""><i class="fa fa-user"></i> {{ session()->get('user')->name }}</a>
                <a href="{{ route('logout') }}"><i class="fa fa-user"></i> Logout</a>
            @else
                <div class="header__top__right__auth">
                    <a href="{{ route('login') }}"><i class="fa fa-user"></i> Login</a>
                </div>
                <div class="header__top__right__auth">
                    <a href="{{ route('register') }}"><i class="fa fa-user"></i>| Registracija</a>
                </div>
            @endif
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="{{ route('pocetna') }}">Home</a></li>
                <li><a href="./shop-grid.html">Shop</a></li>
                <li><a href="./blog.html">Kategorije</a></li>
                <li><a href="./blog.html">Proizvodi</a></li>
                <li><a href="{{ route('kontakt') }}">Contact</a></li>
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
                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                <li>Free Shipping for all Order of $99</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                                <li>Free Shipping for all Order of $99</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-8">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            @if (Auth::check())
                                <div class="header__top__right__auth">
                                    <p>
                                        <a href="{{route('profile.edit')}}"><i class="fa fa-user"></i> {{ Auth::user()->first_name }}</a>
                                        {{-- <a href="{{ route('logout') }}"><i class="fa fa-user"></i> Logout</a> --}}
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <input type="submit" value="Logout">
                                    </form>
                                    </p>
                                @else
                                    <div class="header__top__right__auth">
                                        <a href="{{ route('login') }}"><i class="fa fa-user"></i> Login</a>
                                    </div>
                                    <div class="header__top__right__auth">
                                        <a href="{{ route('register') }}">| Registracija</a>
                                    </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{route('pocetna')}}"><img src="{{asset('images/logo/logo.png')}}" alt="logo"></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="{{ route('pocetna') }}">Home</a></li>
                            <li><a href="{{ route('all-products') }}">Products</a></li>
                            <li><a href="{{ route('cart') }}">Cart</a></li>
                            <li><a href="{{ route('kontakt') }}">Contact</a></li>
                        </ul>
                    </nav>

                    <script>
                        // Get the current URL path
                        var path = "{{ url()->current() }}";

                        // Select all the <a> tags inside the menu
                        var links = document.querySelectorAll('.header__menu a');

                        // Loop through each link and check if the current path matches the generated URL
                        links.forEach(function(link) {
                            if (link.getAttribute('href') === path) {
                                // Add the "active" class to the parent <li> element
                                link.parentNode.classList.add('active');
                            }
                        });
                    </script>

                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="{{route('cart')}}"><i class="fa fa-shopping-bag"></i><span>{{count(session()->get('cart', []))}}</span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>$150.00</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>

        {{-- admin menu - this menu only shows up if the user is admin --}}
        @if (Auth::user() && Auth::user()->roll == 1)
            <nav class="header__menu prosiri_admin_menu">
                <ul>
                    <li><a href="{{ route('admin-proizvodi') }}">Proizvodi</a></li>
                    <li><a href="{{ route('svePoruke') }}">All messages</a></li>
                    <li><a href="{{route('all-users')}}">All Users</a></li>
                </ul>
            </nav>
        @endif
        {{-- admin menu - this menu only shows up if the user is admin --}}
    </header>
