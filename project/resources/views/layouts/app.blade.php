{{--<!doctype html>--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}

{{--    <!-- CSRF Token -->--}}
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}

{{--    <title>{{ config('app.name', 'Laravel') }}</title>--}}

{{--    <!-- Scripts -->--}}
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}

{{--    <!-- Fonts -->--}}
{{--    <link rel="dns-prefetch" href="//fonts.gstatic.com">--}}
{{--    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">--}}
{{--    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">--}}


{{--    <!-- Styles -->--}}
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
{{--</head>--}}
{{--<body>--}}
{{--    <div id="app">--}}
{{--        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">--}}
{{--            <div class="container">--}}
{{--                <a class="navbar-brand" href="{{ url('/') }}">--}}
{{--                    {{ config('app.name', 'Laravel') }}--}}
{{--                </a>--}}
{{--                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">--}}
{{--                    <span class="navbar-toggler-icon"></span>--}}
{{--                </button>--}}

{{--                <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--                    <!-- Left Side Of Navbar -->--}}
{{--                    <ul class="navbar-nav mr-auto">--}}

{{--                    </ul>--}}

{{--                    <!-- Right Side Of Navbar -->--}}
{{--                    <ul class="navbar-nav ml-auto">--}}
{{--                        <!-- Authentication Links -->--}}
{{--                        @guest--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
{{--                            </li>--}}
{{--                            @if (Route::has('register'))--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}
{{--                        @else--}}
{{--                            <li class="nav-item dropdown">--}}
{{--                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                                    {{ Auth::user()->name }} <span class="caret"></span>--}}
{{--                                    <img style="height: 30px ;width: 30px;border-radius:50%;margin-right: 15px  " src="{{ Auth::user()->avatar }}" alt="">--}}

{{--                                </a>--}}

{{--                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
{{--                                    <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                                       onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--                                        {{ __('Logout') }}--}}
{{--                                    </a>--}}

{{--                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
{{--                                        @csrf--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        @endguest--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </nav>--}}

{{--        <main class="py-4">--}}
{{--            @yield('content')--}}
{{--        </main>--}}
{{--    </div>--}}
{{--</body>--}}
{{--</html>--}}


    <!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Home</title>
    <link rel="icon" href="/images/home.jpg " type="image/x-icon">


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="/css/trangchu.css" rel="stylesheet">
    <link href="/css/footer.css" rel="stylesheet">
    <link href="/css/showCart.css" rel="stylesheet">
    <link href="/css/detailProduct.css" rel="stylesheet">
    <link href="/css/confirmCheckout.css" rel="stylesheet">


    <script src="/js/trangchu.js"></script>

    <script src="/js/footer.js"></script>

</head>
<body>


<!-- Main navigation -->
<header>
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
        <div class="container">


            <a class="navbar-brand" href="#">
                <img src="/images/home.jpg " alt="" style="width: 40px ; height: 40px">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7"
                    aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent-7">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('trangchu') }}"><i class="fas fa-home"></i>Trang chủ
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('showCart')}}">Giỏ Hàng</a>
                    </li>
                    {{--                    <li class="nav-item">--}}
                    {{--                        <a class="nav-link" href="#">Profile</a>--}}
                    {{--                    </li>--}}
                </ul>


                <ul class="navbar-nav mr-auto">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                                <img style="height: 30px ;width: 30px;border-radius:50%;margin-right: 15px  "
                                     src="{{ Auth::user()->avatar }}" alt="">

                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest

                </ul>


            </div>
        </div>
    </nav>

    <!-- Full Page Intro -->
{{--    <div class="view"--}}
{{--         style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/Others/architecture.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">--}}
{{--        <!-- Mask & flexbox options-->--}}
{{--        <div class="mask rgba-gradient d-flex justify-content-center align-items-center">--}}
{{--            <!-- Content -->--}}
{{--            <div class="container">--}}
{{--                <!--Grid row-->--}}

{{--                <div class="row">--}}
{{--                    <!--Grid column-->--}}
{{--                    <div class="col-md-6 white-text text-center text-md-left mt-xl-5 mb-5 wow fadeInLeft"--}}
{{--                         data-wow-delay="0.3s">--}}
{{--                        <h1 class="h1-responsive font-weight-bold mt-sm-5">Nhanh Tay Mua Sắm </h1>--}}
{{--                        <hr class="hr-light">--}}
{{--                        <h4 class="mb-4" style="color:seagreen; font-weight: bold ;">Thang'Shop</h4>--}}
{{--                        <a href="{{route('trangchu')}}" class="btn btn-primary"--}}
{{--                           style="margin-top: 50px; color: wheat"><i class="fas fa-shopping-bag"></i> Mua--}}
{{--                            Ngay--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                    <!--Grid column-->--}}
{{--                    <!--Grid column-->--}}
{{--                    <div class="col-md-6 col-xl-5 mt-xl-5 wow fadeInRight" data-wow-delay="0.3s">--}}
{{--                        <img src="https://mdbootstrap.com/img/Mockups/Transparent/Small/admin-new.png" alt=""--}}
{{--                             class="img-fluid">--}}
{{--                    </div>--}}
{{--                    <!--Grid column-->--}}
{{--                </div>--}}
{{--                <!--Grid row-->--}}
{{--            </div>--}}
{{--            <!-- Content -->--}}
{{--        </div>--}}
{{--        <!-- Mask & flexbox options-->--}}
{{--    </div>--}}
<!-- Full Page Intro -->
</header>
<!-- Main navigation -->

<br>


<br>
<br>


<main class="py-4">
    @yield('content')
</main>


<footer class="footer">
    {{--    <div class="container bottom_border">--}}
    {{--        <div class="row">--}}
    {{--            <div class=" col-sm-4 col-md col-sm-4  col-12 col">--}}
    {{--                <h5 class="headin5_amrc col_white_amrc pt2">Find us</h5>--}}
    {{--                <!--headin5_amrc-->--}}
    {{--                <p class="mb10">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum--}}
    {{--                    has been the industry's standard dummy text ever since the 1500s</p>--}}
    {{--                <p><i class="fa fa-location-arrow"></i> 9878/25 sec 9 rohini 35 </p>--}}
    {{--                <p><i class="fa fa-phone"></i> +91-9999878398 </p>--}}
    {{--                <p><i class="fa fa fa-envelope"></i> info@example.com </p>--}}


    {{--            </div>--}}


    {{--            <div class=" col-sm-4 col-md  col-6 col">--}}
    {{--                <h5 class="headin5_amrc col_white_amrc pt2">Quick links</h5>--}}
    {{--                <!--headin5_amrc-->--}}
    {{--                <ul class="footer_ul_amrc">--}}
    {{--                    <li><a href="http://webenlance.com">Image Rectoucing</a></li>--}}
    {{--                    <li><a href="http://webenlance.com">Clipping Path</a></li>--}}
    {{--                    <li><a href="http://webenlance.com">Hollow Man Montage</a></li>--}}
    {{--                    <li><a href="http://webenlance.com">Ebay & Amazon</a></li>--}}
    {{--                    <li><a href="http://webenlance.com">Hair Masking/Clipping</a></li>--}}
    {{--                    <li><a href="http://webenlance.com">Image Cropping</a></li>--}}
    {{--                </ul>--}}
    {{--                <!--footer_ul_amrc ends here-->--}}
    {{--            </div>--}}


    {{--            <div class=" col-sm-4 col-md  col-12 col">--}}
    {{--                <h5 class="headin5_amrc col_white_amrc pt2">Follow us</h5>--}}
    {{--                <!--headin5_amrc ends here-->--}}

    {{--                <ul class="footer_ul2_amrc">--}}
    {{--                    <li><a href="#"><i class="fab fa-twitter fleft padding-right"></i> </a>--}}
    {{--                        <p>Lorem Ipsum is simply dummy text of the printing...<a href="#">https://www.lipsum.com/</a>--}}
    {{--                        </p></li>--}}
    {{--                    <li><a href="#"><i class="fab fa-twitter fleft padding-right"></i> </a>--}}
    {{--                        <p>Lorem Ipsum is simply dummy text of the printing...<a href="#">https://www.lipsum.com/</a>--}}
    {{--                        </p></li>--}}
    {{--                    <li><a href="#"><i class="fab fa-twitter fleft padding-right"></i> </a>--}}
    {{--                        <p>Lorem Ipsum is simply dummy text of the printing...<a href="#">https://www.lipsum.com/</a>--}}
    {{--                        </p></li>--}}
    {{--                </ul>--}}
    {{--                <!--footer_ul2_amrc ends here-->--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}


    {{--    <div class="container">--}}
    {{--        <ul class="foote_bottom_ul_amrc">--}}
    {{--            <li><a href="http://webenlance.com">Home</a></li>--}}
    {{--            <li><a href="http://webenlance.com">About</a></li>--}}
    {{--            <li><a href="http://webenlance.com">Services</a></li>--}}
    {{--            <li><a href="http://webenlance.com">Pricing</a></li>--}}
    {{--            <li><a href="http://webenlance.com">Blog</a></li>--}}
    {{--            <li><a href="http://webenlance.com">Contact</a></li>--}}
    {{--        </ul>--}}
    {{--        <!--foote_bottom_ul_amrc ends here-->--}}
    {{--        <p class="text-center">Copyright @2017 | Designed With by <a href="#">Your Company Name</a></p>--}}

    {{--        <ul class="social_footer_ul">--}}
    {{--            <li><a href="http://webenlance.com"><i class="fab fa-facebook-f"></i></a></li>--}}
    {{--            <li><a href="http://webenlance.com"><i class="fab fa-twitter"></i></a></li>--}}
    {{--            <li><a href="http://webenlance.com"><i class="fab fa-linkedin"></i></a></li>--}}
    {{--            <li><a href="http://webenlance.com"><i class="fab fa-instagram"></i></a></li>--}}
    {{--        </ul>--}}
    {{--        <!--social_footer_ul ends here-->--}}
    {{--    </div>--}}

    @yield('content1')
</footer>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
</body>
</html>
