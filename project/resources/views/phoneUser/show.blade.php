@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-8 offset-md-2">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">SĐT</th>
                </tr>
                </thead>
                @foreach($dl as $dl)
                    <tbody>

                    <tr>
                        <th scope="row">{{ $dl -> id}}</th>
                        <td>{{$dl -> phone }}</td>
                        <td>{{$dl -> user -> name }}</td>
{{--                        // gọi đến hàm user như thuộc tính để lấy kêt quả bên user--}}
                    </tr>

                    </tbody>
                @endforeach

            </table>


        </div>
    </div>


@endsection
