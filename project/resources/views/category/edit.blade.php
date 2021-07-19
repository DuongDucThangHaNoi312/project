@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-8 offset-md-2">
            {{--            @foreach($product as $productDetail)--}}
            <form action="{{ route('category.update', $category->id) }}" method="post" enctype='multipart/form-data'>
                @csrf
                @method('PUT')
                <div class="form-group">
                    <h2 class="text-md-center"> Form Edit Product </h2>
                    <div class="form-group">
                        <label for="name">ID</label>
                        <input type="text" id="id" name="id"
                               value="{{ $category->id }}">

                    </div>

                    <div class="form-group">
                        <label for="name">Products</label>
                        <input type="text" id="name" name="name"
                               value="{{ $category->name }}">
                    </div>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
            {{--            @endforeach--}}

        </div>
    </div>

@endsection
