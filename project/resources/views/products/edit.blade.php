@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-8 offset-md-2">
            {{--            @foreach($product as $productDetail)--}}
            <form action="{{ route('product.update', $product->id) }}" method="post" enctype='multipart/form-data'>
                @csrf
                @method('PUT')
                <div class="form-group">
                    <h2 class="text-md-center"> Form Edit Product </h2>
                    <div class="form-group">
                        <label for="name">ID</label>
                        <input type="text" id="id" name="id"
                               value="{{ $product->id }}">

                    </div>

                    <div class="form-group">
                        <label for="name">Products</label>
                        <input type="text" id="name" name="name"
                               value="{{ $product->name }}">
                    </div>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image">Products</label>
                    <img style="width: 40px; height: 40px ;" src="{{ url('/images/'.$product->image) }}" alt="">
                    <br>
                    <input type="file" id="image" name="image">
                    <input type="hidden" id="image_old" name="image_old"
                           value="{{$product -> image}}">
                </div>
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror


                <div class="form-group ">
                    <label for="category_id	">Category</label>
                    {{--                    <input type="text" value="{{ $product->category->name }}">--}}
                    <select name="category_id">
                        <option selected="selected">{{ $product->category->name }}</option>
                        @foreach( $categories as $key => $category)
                            <option value="{{ $key}}">{{ $category }}</option>
                        @endforeach
                    </select>

                </div>


                <button type="submit" class="btn btn-primary">Update</button>
            </form>
            {{--            @endforeach--}}

        </div>
    </div>

@endsection
