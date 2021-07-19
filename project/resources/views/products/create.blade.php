@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-8 offset-md-2">
            <form action="{{route('product.store') }}" method="post" enctype='multipart/form-data'>
                @csrf
                <h2 class="text-md-center"> Form Add Product </h2>
                <div class="form-group">
                    <label for="name">Products</label>
                    <input type="text" id="name" name="name"
                           placeholder="Enter name">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group ">
                    <label for="image">Upload Avatar</label>

                    <input id="image" type="file" name="image">

                    @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>

                <div class="form-group ">
                    <label for="category_id	">Category</label>

                    <select name="category_id" >
                        @foreach( $categories as $key => $category)
                        <option value="{{ $key}}" >{{ $category }}</option>
                        @endforeach
                    </select>

{{--                    @error()--}}
{{--                    <div class="alert alert-danger">{{ $message }}</div>--}}
{{--                    @enderror--}}

                </div>

                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>

@endsection
