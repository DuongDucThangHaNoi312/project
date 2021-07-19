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
    <link href="/css/search.css" rel="stylesheet">
    <script src="/js/trangchu.js"></script>
</head>
<body>


<!-- Main navigation -->
<header>
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
        <div class="container-fluid">


            <div class="row">


                <div class="navLeft">
                    <div class="collapse navbar-collapse " id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{route('trangchu')}}"><i class="fas fa-home"></i>Home
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"> <i class="fas fa-link"></i> Link</a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="navRight float-left " style="margin-left: 800px">

                    <ul class="navbar-nav ">

                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"><i
                                        class="fas fa-user"></i> {{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}"><i
                                            class="fas fa-sign-out-alt"></i> {{ __('Register') }}</a>
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

                            <li>
                                <a target="_blank" href="{{route('showCart') }}" class="btn btn-warning">
                                    <i class="fas fa-shopping-cart"></i>
                                    <span>{{Cart::getTotalQuantity()}}</span>
                                </a>
                            </li>

                        @endguest

                    </ul>
                </div>

            </div>

        </div>


    </nav>


    <!-- Full Page Intro -->
    <div class="view"
         style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/Others/architecture.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
        <!-- Mask & flexbox options-->
        <div class="mask rgba-gradient d-flex justify-content-center align-items-center">
            <!-- Content -->
            <div class="container">
                <!--Grid row-->

                <div class="row">
                    <!--Grid column-->
                    <div class="col-md-6 white-text text-center text-md-left mt-xl-5 mb-5 wow fadeInLeft"
                         data-wow-delay="0.3s">
                        <h1 class="h1-responsive font-weight-bold mt-sm-5">Nhanh Tay Mua Sắm </h1>
                        <hr class="hr-light">
                        <h4 class="mb-4" style="color:seagreen; font-weight: bold ;">Thang'Shop</h4>
                        <a href="{{route('trangchu')}}" class="btn btn-info" style="margin-top: 50px"><i
                                class="fas fa-shopping-bag"></i> Mua
                            Ngay
                        </a>
                        {{--                        <a href="{{route('showCart')}}">--}}
                        {{--                            show--}}
                        {{--                        </a>--}}


                    </div>
                    <!--Grid column-->
                    <!--Grid column-->
                    <div class="col-md-6 col-xl-5 mt-xl-5 wow fadeInRight" data-wow-delay="0.3s">
                        <img src="https://mdbootstrap.com/img/Mockups/Transparent/Small/admin-new.png" alt=""
                             class="img-fluid">
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </div>
            <!-- Content -->
        </div>
        <!-- Mask & flexbox options-->
    </div>
    <!-- Full Page Intro -->
</header>
<!-- Main navigation -->

<br>
<main>

    <div class=" container-fluid">
        <div class="container -fluid">
            <div class="row">


                <div class="col-md-3 " id="listCateLeft">
                    <div class="nav-responsive">
                        <div class="heading-part">
                            <h5 class="main_title " style="color: #1a202c">Mặt hàng</h5>
                            <hr style="background: crimson 2px; border-radius: 2px">
                            <ul id="listCate" class=" list-group list-group-flush">
                                @foreach($categories as $category)

                                    <li class=" list-group list-group-item">
                                        <a href="{{ route('getProductByCategory', $category->id)}}">
                                            {{$category->name}}
                                        </a>
                                    </li>

                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="row">
                        <h5>Tìm kiếm sản phẩm</h5>
                        <form method="post" action="{{route('searchProductAtHome')}}">
                            @csrf
                            <div class="container h-100">
                                <div class="d-flex justify-content-center h-100">
                                    <div class="searchbar">

                                        <input class="search_input" type="text" name="keySearch"
                                               placeholder="Search product">
                                        <button type="submit" class="search_icon"><i class="fas fa-search"></i></button>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <span>Kết quả tìm kiếm : {{$key}}</span>

                    <br>
                    <br>
                    <div class="row " id="listProduct">
                        @foreach($productSearchs as $productSearch)

                            <div class="col-md-4  ">
                                <div class="product-grid listProduct">
                                    <div class="product-image ">

                                        <img class="pic-1" src="{{url('/images/'.$productSearch->image)}}">
                                        <div class="productname "><span style="color: black ;font-weight: normal"> Name : </span>{{ $productSearch->name }}
                                        </div>
                                        Price :<span class="price">{{ number_format($productSearch->price) }} VNĐ</span>

                                        <div>
                                            <form action="{{route('saveCart') }}" method="post"
                                                  enctype='multipart/form-data'>
                                                @csrf

                                                <div class="formQuantity">
{{--                                                    <label for="">Quantity :</label>--}}
{{--                                                    <input name="quantity" class="formQuantityInput" type="number"--}}
{{--                                                           min="1" value="1">--}}
                                                    <input name="productIdHidden" class="formQuantityInput"
                                                           type="hidden"
                                                           value="{{$productSearch->id}}">
                                                </div>
{{--                                                <button type="submit" class=" btn btn-success"--}}
{{--                                                        style="margin-top: 5px" target="_blank">Mua Ngay--}}
{{--                                                </button>--}}


                                                <a class="btn btn-outline-success" href="{{route('detailProduct',$productSearch->id)}}"
                                                    data-tip="Quick View">Mua ngay</a>
                                                {{--                                                <button type="submit" class="btn btn-primary">Add</button>--}}
                                                {{--                                                    <i class="fas fa-shopping-cart"></i>--}}
                                                {{--                                                <button data-url="{{ route('addToCart',['id' =>$product->id]) }} "--}}


                                                <ul class="social">
                                                    <li><a href="{{route('detailProduct',$productSearch->id)}}"
                                                           data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                                                </ul>
                                            </form>
                                        </div>
                                        <span class="product-new-label text-bold">Sale</span>
                                        <span class="product-discount-label">20%</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
    <br>
    <br>
{{--    <div class="container-fluid">--}}
{{--        <div class="row">--}}
{{--            <div id="paginate">--}}
{{--                {{ $productSearch ->links() }}--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

</main>

<br>
<br>


<footer class="footer">
    <div class="container bottom_border">
        <div class="row">
            @foreach($infoFooters as $infoFooter)
                <div class=" col-sm-4 col-md col-sm-4  col-12 col">
                    <h5 class="headin5_amrc col_white_amrc pt2">Find us</h5>
                    <!--headin5_amrc-->
                    <p class="mb10"> {{ $infoFooter ->text}}</p>
                    <p><i class="fa fa-location-arrow"></i>{{ $infoFooter ->address}} </p>
                    <p><i class="fa fa-phone"></i> {{ $infoFooter ->phone}}</p>
                    <p><i class="fa fa fa-envelope"></i> {{ $infoFooter ->email}} </p>


                </div>




                <div class=" col-sm-4 col-md-4  col-12 col">
                    <h5 class="headin5_amrc col_white_amrc pt2">Follow us</h5>
                    <!--headin5_amrc ends here-->

                    <ul class="footer_ul2_amrc">
                        <li><a href="{{ $infoFooter ->linkFacebook }}" target="_blank"><i
                                    class="fab fa-facebook fleft padding-right"></i> </a>
                            <p>Facebook
                                <a></a>
                            </p>
                        </li>

                        <li><a href="{{ $infoFooter ->linkTwitter }}" target="_blank"><i
                                    class="fab fa-twitter fleft padding-right"></i> </a>
                            <p>Twitter
                                <a href="#"></a>
                            </p>
                        </li>
                        <li><a href="{{ $infoFooter ->linkInstargam }}" target="_blank"><i
                                    class="fab fa-instagram fleft padding-right"></i> </a>
                            <p>Instargam

                            </p>
                        </li>

                        <li><a href="{{ $infoFooter ->linkGoogle }}" target="_blank"><i
                                    class="fab fa-google fleft padding-right"></i> </a>
                            <p>Googgle

                            </p>
                        </li>
                    </ul>
                    <!--footer_ul2_amrc ends here-->
                </div>

                <div class=" col-sm-4 col-md-4  col-12 col">
                    <h5 class="headin5_amrc col_white_amrc pt2">Map</h5>

                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3719.1696058009297!2d105.75891931443915!3d21.225121986422774!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3134fd952eebcba9%3A0x8e4483699b0fc656!2zVHLGsOG7nW5nIFRIUFQgS2ltIEFuaA!5e0!3m2!1svi!2s!4v1625642780528!5m2!1svi!2s"
                        width="100%" height="auto" style="border:3px solid darkslategray; border-radius: inherit"
                        allowfullscreen="" loading="lazy"></iframe>
                </div>


        </div>
    </div>


    <div class="container">
        <!--foote_bottom_ul_amrc ends here-->
        <p class="text-center">Copyright @2021 Designed With by <a href="{{route('trangchu')}}">Dương Đức Thắng</a></p>

        <ul class="social_footer_ul">
            <li><a href="{{  $infoFooter ->linkFacebook  }}" target="_blank"><i class="fab fa-facebook-f"></i> </a>
            </li>
            <li><a href="{{ $infoFooter ->linkTwitter }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
            <li><a href="{{ $infoFooter ->linkGoogle }}" target="_blank"><i class="fab fa-linkedin"></i></a>
            </li>
            <li><a href="{{ $infoFooter ->linkInstargam }}" target="_blank"><i class="fab fa-instagram"></i></a>
            </li>
        </ul>
        <!--social_footer_ul ends here-->
    </div>
    @endforeach

</footer>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>

<script>
    function addToCart(event) {
        event.preventDefault();
        let urlAddToCart = $(this).data('url');
        $.ajax({
            type: "GET",
            url: urlAddToCart,
            dataType: 'json',
            success: function (data) {
                if (data.code === 200) {
                    alert('Sản phầm được thêm vào giỏ hàng')
                }


            },
            error: function () {

            }
        });


    }

    $(function () {
        $('.addToCart').on('click', addToCart);
    });
</script>
</body>
</html>
