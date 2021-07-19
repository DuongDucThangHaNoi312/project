@extends('layouts.app')

@section('content')
    {{--{{dd($productDetail)}}--}}
    <div class="container">
        <div class="card">
            <div class="container-fliud">
                <div class="wrapper row">
                    @foreach($productDetail as $value)
                        <div class="preview col-md-6">


                            <div class="preview-pic tab-content">
                                <div class="tab-pane active" id="pic-1"><img style="width: 200px; height: 200px"
                                                                             src="{{ url('/images/'.$value->image) }}"
                                                                             alt=""></div>
                            </div>
                            <ul class="preview-thumbnail nav nav-tabs">
                                <li class="active"><a data-target="#pic-1" data-toggle="tab"><img
                                            src="{{ url('/images/'.$value->image) }}" alt=""></a></li>
                                <li><a data-target="#pic-2" data-toggle="tab"><img
                                            src="{{ url('/images/'.$value->image) }}" alt=""></a></li>
                                <li><a data-target="#pic-3" data-toggle="tab"><img
                                            src="{{ url('/images/'.$value->image) }}" alt=""></a></li>
                                <li><a data-target="#pic-4" data-toggle="tab"><img
                                            src="{{ url('/images/'.$value->image) }}" alt=""></a></li>
                                <li><a data-target="#pic-5" data-toggle="tab"><img
                                            src="{{ url('/images/'.$value->image) }}" alt=""></a></li>
                            </ul>

                        </div>
                        <div class="details col-md-6">
                            <form action="{{route('saveCart')}}" method="post">
                                @csrf
                                <div>
                                    <p class="product-title">{{$value->name}}</p>
                                    <p class="product-description">{{$value->description}}</p>
                                </div>

                                <div>
                                    SL : <input name="qty" type="number" value="1" min="1">
                                    <input name="productIdHidden" type="hidden" value="{{$value->id}}">
                                    <p class="price">current price: <span>{{number_format($value->price)}} VNĐ</span>
                                    </p>

                                </div>
                                <button type="submit" class="btn-success"><i class="fas fa-shopping-cart"></i> Mua Ngay
                                </button>
                            </form>


                        </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <br>

    <div class="container-fluid">
        <div class="col-md-8 offset-md-2">
            <h4 class="text-bold text-gray-dark">Các sản phẩm liên quan</h4>
            <div class="row " id="listProduct">


                @foreach($productRelates as $productRelate)
                    <div class="col-md-4 ">
                        <div class="product-grid listProduct">
                            <div class="product-image ">

                                <img class="pic-1" src="{{url('/images/'.$productRelate->image)}}">
                                <div class="productname "><span
                                        style="color: black ;font-weight: normal"> Name : </span>{{ $productRelate->name }}
                                </div>
                                Price :<span class="price">{{ number_format($productRelate->price) }} VNĐ</span>

                                <div>
                                    <form action="{{route('detailProduct',$productRelate->id )}}" method="post"
                                          enctype='multipart/form-data'>
                                        @csrf
                                        <div class="formQuantity">
                                            <input name="categoryId" class="formQuantityInput"
                                                   type="hidden"
                                                   value="{{$productRelate->category_id}}">
                                        </div>

                                        <div class="formQuantity">

                                            <input name="productIdHidden" class="formQuantityInput"
                                                   type="hidden"
                                                   value="{{$productRelate->id}}">
                                        </div>
                                        {{--                                                <button type="submit" class=" btn btn-success"--}}
                                        {{--                                                        style="margin-top: 5px" target="_blank">Mua Ngay--}}
                                        {{--                                                </button>--}}


                                        {{--                                                <a class="btn btn-outline-success"--}}
                                        {{--                                                   href="{{route('detailProduct',$product->id)}}"--}}
                                        {{--                                                   data-tip="Quick View">Mua ngay</a>  --}}
                                        <ul class="social">
                                            <li><a href="{{route('detailProduct',$productRelate->id)}}"
                                                   data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                                        </ul>
                                        <button class="btn btn-outline-success"
                                                type="submit" data-tip="Quick View">Mua ngay
                                        </button>

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
    <br>

    @if(Auth::user())
        @foreach($productDetail as $value)
            <div class="container-fluid">

                <div class="col-md-8 offset-md-2">

                    <form class="" action="{{route('comment.store')}}" method="post">
                        @csrf
                        <div class="row">

                            <div class="col-md-2">
                                <p>
                                    <img style="border-radius:50%;  "
                                         src="{{ Auth::user()->avatar }}" alt="">
                                </p>
                            </div>
                            <div>
                                <input type="hidden" class="form-control" name="productIdHidden"
                                       value="{{$value->id}}">
                            </div>
                            <div>
                                <input type="hidden" class="form-control" name="categoryIdHidden"
                                       value="{{$value->category_id}}">
                            </div>
                            <div>
                                <input type="hidden" class="form-control" name="userIdHidden"
                                       value="{{ Auth::user()->id }}">
                            </div>
                            <div>
                                <input type="hidden" class="form-control" name="nameUserHidden"
                                       value="{{ Auth::user()->name }}">
                            </div>
                            <div class="col-md-10">
                                <textarea type="text" class="form-control" id="content" name="content"
                                          placeholder="Enter content"></textarea>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary">Gửi</button>


                    </form>
                </div>
            </div>
        @endforeach
    @endif


    @foreach($COMMENTS as  $COMMENT)
        @foreach($productDetail as $value)
            @if($COMMENT->idProduct == $value->id)
                <div class='container-fluid'>
                    <div class="col-md-8 offset-md-2">

                        <div class="media comment-box">
                            <div class="media-left">

                                <img class="img-responsive user-photo" src=" {{$COMMENT->user->avatar}}">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">{{$COMMENT->user->name}}</h4>
                                <p>{{$COMMENT->content}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    @endforeach
    {{--    @endif--}}



@endsection

@section('content1')
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
            <p class="text-center">Copyright @2021 Designed With by <a href="{{route('trangchu')}}">Dương Đức Thắng</a>
            </p>

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
@endsection





