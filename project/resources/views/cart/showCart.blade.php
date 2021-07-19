@php
    $contents = Cart::getContent();
@endphp


@extends('layouts.app')

@section('content')

    <div class="cartDetails">


        <div class="container mb-4  ">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col"> Thứ Tự</th>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col" class="text-center">Số lượng</th>
                                {{--                                <th scope="col" class="text-center">Cập nhật số lượng</th>--}}

                                <th scope="col" class="text-right">Giá</th>
                                <th scope="col" class="text-right">Tổng giá</th>
                                {{--                                <th>Update</th>--}}
                                <th>Xóa</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1;

                            @endphp

                            @if(isset($contents))

                                @foreach($contents as $content)




                                    <td>{{$i}}</td>
                                    <td><img style="width: 100px; height: 100px ;"
                                             src="{{ url('/images/'.$content->attributes['image'])}}"></td>
                                    <td>{{$content->name}}</td>
                                    <td>
                                        <form method="post" action="{{route('updateCart')}}">
                                            @csrf
                                            <div>
                                                <input name="idProductHidden" class="form-control" type="hidden"
                                                       value="{{$content->id}}"/>

                                                <input class="form-control" min="1" type="number"
                                                       value="{{$content->quantity}}" name="quantity"/>
                                            </div>
                                            <button type="submit">Cập nhật</button>

                                        </form>
                                    </td>

                                    <td class="text-right">{{number_format($content->price)}} VNĐ</td>
                                    <td class="text-right">
                                        {{number_format(($content->price)*($content->quantity))}}
                                    </td>

                                    <td class="text-right">

                                        <a onclick="return confirm('Bạn có muốn khóa sản phẩm khỏi giỏ hang không')"
                                           href="{{route('deleteCart',$content->id)}}" class="btn btn-sm btn-danger"><i
                                                class="fa fa-trash"></i></a>
                                    </td>
                                    </tr>


                                    @php
                                        $i ++;
                                    @endphp

                                @endforeach

                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td style="font-weight: bold">Tồng Tiền</td>
                                    <td class="text-right"> {{number_format(Cart::getTotal())}}VNĐ</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td style="font-weight: bold">Phí Vận Chuyển</td>
                                    <td class="text-right">Free</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><strong>Thanh Toán</strong></td>
                                    <td class="text-right"><strong>{{number_format(Cart::getTotal())}}</strong>VNĐ</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col mb-2">
                    <div class="row">
                        <div class="col-sm-12  col-md-6">
                            <a href="{{route('trangchu')}}" class="btn btn-block btn-light">Shop</a>
                        </div>
                        <div class="col-sm-12 col-md-6 text-right">
                            <a href="{{route('checkOut')}}" class="btn btn-block btn-success ">Thanh Toán</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection

@php
    use App\Models\InforFooter;
   $infoFooters = InforFooter::all() ;
@endphp


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





