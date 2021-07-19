@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-8 offset-md-2">
            <table class="table table-striped">


                <button type="button" class="btn btn-success"><a href="{{ route('product.index') }}"  style="text-decoration: none ; color: white"  >
                        Back
                    </a>
                </button>



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
                    <th scope="col" colspan="3">Action</th>
                </tr>
                </thead>
                <tbody>

                    <tr>
                        <th scope="row">{{$products -> id}}</th>
                        <td>{{$products -> name }}</td>
                        <td><img style="width: 40px; height: 40px ;"  src="{{ url('/images/'.$products->image) }}" alt=""></td>

                        <td>
                            <form action="{{ route('product.destroy',$products->id) }}" method="POST">
                                <a href="{{ route('product.show',$products->id) }}" class="btn-outline-info" style="margin: 10px"><i
                                        class="fas fa-eye"></i></a>
                                <a href="{{ route('product.edit', $products->id)}} " class="btn-outline-warning"
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

                </tbody>
            </table>


        </div>
    </div>


@endsection
