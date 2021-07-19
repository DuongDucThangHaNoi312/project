@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-8 offset-md-2">
            <form action="{{route('category.store') }}" method="post" enctype='multipart/form-data'>
                @csrf
                <h2 class="text-md-center"> Form Add Category </h2>
                <div class="form-group">
                    <label for="name">Products</label>
                    <input type="text" id="name" name="name"
                           placeholder="Enter name">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>

@endsection
