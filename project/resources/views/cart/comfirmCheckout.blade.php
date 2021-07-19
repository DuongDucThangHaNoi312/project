@extends('layouts.app')
@section('content')

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 pb-5">


                <!--Form with header-->

                <form action="{{route('savecheckOut')}}" method="post">
                    @csrf


                    <div class="card border-primary rounded-0">
                        <div class="card-header p-0">
                            <div class="bg-info text-white text-center py-2">
                                <h3><i class="fa fa-envelope"></i> Liên Lạc</h3>
                                <p class="m-0">Thông Tin Khách Hàng</p>
                            </div>
                        </div>
                        <div class="card-body p-3">

                            <!--Body-->
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <input name="user_id" type="hidden" class="form-control"
                                           value="{{Auth::user()->id}}">
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <input type="text" name="name" class="form-control" placeholder="Tên người nhận" >
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="input-group mb-2">

                                    <input type="text" class="form-control" name="address"
                                           placeholder="Địa chỉ nhận hàng" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <input class="form-control" name="phone" placeholder="Số Điện Thoại"
                                           required></input>
                                </div>
                            </div>




                            <div>
                                <div class="text-center">
                                    <input type="submit" value="Xác Nhận" class="btn btn-info btn-block rounded-0 py-2">
                                </div>
                            </div>

                        </div>
                        <div class="text-center">
                            <a href="{{route('showCart')}}" class="btn btn-info btn-block rounded-0 py-2">Xem lại giỏ
                                hàng</a>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>
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



