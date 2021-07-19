@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember"
                                               id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
                                    <a class="btn btn-secondary" href="{{route('register')}}">Đăng Kí</a>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>

                            </div>
                        </form>
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


