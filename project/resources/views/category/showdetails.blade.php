@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-8 offset-md-2">
            <table class="table table-striped">


                <button type="button" class="btn btn-success"><a href="{{ route('category.index') }}"  style="text-decoration: none ; color: white"  >
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
                    <th scope="col" colspan="3">Action</th>
                </tr>
                </thead>
                <tbody>

                    <tr>
                        <th scope="row">{{$category -> id}}</th>
                        <td>{{$category -> name }}</td>
                        <td>
                            <form action="{{ route('category.destroy',$category->id) }}" method="POST">
                                <a href="{{ route('category.show',$category->id) }}" class="btn-outline-info" style="margin: 10px"><i
                                        class="fas fa-eye"></i></a>
                                <a href="{{ route('category.edit', $category->id)}} " class="btn-outline-warning"
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
