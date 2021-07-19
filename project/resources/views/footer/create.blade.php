@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-8 offset-md-2">
            <form action="{{route('linkfooter.store') }}" method="post" enctype='multipart/form-data'>
                @csrf
                <h3>InfomationFooter</h3>
                <label>
                    <p class="label-txt">Text</p>
                    <input type="text" class="input" name="text">
                    <div class="line-box">
                        <div class="line"></div>
                    </div>
                </label>
                <label>
                    <p class="label-txt">Address</p>
                    <input type="text" class="input" name="address">
                    <div class="line-box">
                        <div class="line"></div>
                    </div>
                </label>
                <label>
                    <p class="label-txt">Phone</p>
                    <input type="text" class="input" name="phone">
                    <div class="line-box">
                        <div class="line"></div>
                    </div>
                </label>
                <label>
                    <p class="label-txt">Email</p>
                    <input type="text" class="input" name="email">
                    <div class="line-box">
                        <div class="line"></div>
                    </div>
                </label>
                <label>
                    <p class="label-txt">LinkFacebook</p>
                    <input type="text" class="input" name="linkFacebook">
                    <div class="line-box">
                        <div class="line"></div>
                    </div>
                </label>
                <label>
                    <p class="label-txt">LinkInstargam</p>
                    <input type="text" class="input" name="linkInstargam">
                    <div class="line-box">
                        <div class="line"></div>
                    </div>
                </label>
                <label>
                    <p class="label-txt">LinkTwitter</p>
                    <input type="text" class="input" name="linkTwitter">
                    <div class="line-box">
                        <div class="line"></div>
                    </div>
                </label>

                <label>
                    <p class="label-txt">LinkGoogle</p>
                    <input type="text" class="input" name="linkGoogle">
                    <div class="line-box">
                        <div class="line"></div>
                    </div>
                </label>

                <button type="submit">submit</button>
            </form>
        </div>
    </div>

@endsection
