@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-8 offset-md-2">

            <form action="{{route('searchProduct')}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                @csrf
                {{--                @method('PUT')--}}


                <div class="input-group">
                    <div class="form-outline">
                        <input name="keysearch" type="search" class="form-control"
                               placeholder="search product"/>
                    </div>

                    <button type="submit" class="btn btn-primary" style="margin-left: 10px">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
            <br>

            <table class="table table-striped">


                <button type="button" class="btn btn-success"><a href="{{ route('product.create') }}"
                                                                 style="text-decoration: none" class="btn-success">
                        Add Product
                    </a>

                </button>
                <br>
                <br>


                <h3> Tổng sản phẩm : {{ $products->total() }} </h3>

                <hr>
                @if(session()->get('deletesuccess'))
                    <div class="alert alert-success">
                        {{ session()-> get('deletesuccess')}}
                    </div>
                @endif
                @if(session()->get('createsuccess'))
                    <div class="alert alert-success">
                        {{ session()-> get('createsuccess')}}
                    </div>
                @endif
                @if(session()->get('editsuccess'))
                    <div class="alert alert-success">
                        {{ session()-> get('editsuccess')}}
                    </div>
                @endif

                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Category_ID</th>
                    <th scope="col">Category_Name</th>
                    <th scope="col" colspan="3">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <th scope="row">{{$product -> id}}</th>
                        <td>{{$product -> name }}</td>
                        <td><img style="width: 40px; height: 40px ;" src="{{ url('/images/'.$product->image) }}" alt="">
                        </td>
                        <td>
                            {{$product->category->id}}
                        </td>
                        <td>
                            {{$product->category->name}}
                        </td>

                        <td>

                            <form action="{{ route('product.destroy',$product->id) }}" method="POST">
                                <a href="{{ route('product.show',$product->id) }}" class="btn-outline-info"
                                   style="margin: 10px"><i
                                        class="fas fa-eye"></i></a>
                                <a href="{{ route('product.edit', $product->id)}} " class="btn-outline-warning"
                                   style="margin: 10px"><i
                                        class="fas fa-edit"></i></a>
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn-outline-danger"
                                        onclick="return confirm('Bạn có chắc chắn xóa không ? ');" style="margin: 10px">
                                    <i
                                        class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

            {{ $products->links() }}
        </div>
    </div>


@endsection
