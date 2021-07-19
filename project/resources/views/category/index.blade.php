@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-8 offset-md-2">

            <form action="{{route('searchCategory')}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                @csrf
                {{--                @method('PUT')--}}


                <div class="input-group">
                    <div class="form-outline">
                        <input name="keysearch" type="search" class="form-control"
                               placeholder="search category"/>
                    </div>

                    <button type="submit" class="btn btn-primary" style="margin-left: 10px">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>

            @if(isset($key))
                <small><i>Tìm kiếm cho {{ $key }} </i></small>

            @endif
            <br>


            <table class="table table-striped">


                    <button type="button" class="btn btn-success"><a href="{{route('category.create')}}"
                                                                     style="text-decoration: none" class="btn-success">
                            Add Category
                        </a>

                    </button>



                    @if(isset($key))
                        <button style="margin-left: 20px" type="button" class="btn btn-success"><a href="{{route('category.index')}}"
                                                                         style="text-decoration: none"
                                                                         class="btn-success">
                                Home
                            </a>

                            @endif
                        </button>

                        <br>
                        <br>


                        <h3> Tổng Category : {{ $categories->total() }} </h3>

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
                        @foreach($categories as $category)
                            <tr>
                                <th scope="row">{{$category -> id}}</th>
                                <td>{{$category -> name }}</td>
                                <td>
                                    <form action="{{ route('category.destroy',$category->id) }}" method="POST">
                                        <a href="{{ route('category.show',$category->id) }}" class="btn-outline-info"
                                           style="margin: 10px"><i
                                                class="fas fa-eye"></i></a>
                                        <a href="{{ route('category.edit', $category->id)}} "
                                           class="btn-outline-warning"
                                           style="margin: 10px"><i
                                                class="fas fa-edit"></i></a>
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn-outline-danger"
                                                onclick="return confirm('Bạn có chắc chắn xóa không ? ');"
                                                style="margin: 10px">
                                            <i
                                                class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
            </table>

            {{ $categories->links() }}
        </div>
    </div>


@endsection
