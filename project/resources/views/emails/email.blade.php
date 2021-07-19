{{--<h1>{{$bills}}</h1>--}}
{{--{{die()}}--}}
    <!DOCTYPE html>
<html>
<head>
    <title> Send Email Example</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

<p>Người đặt hàng : {{$bills->name}}</p>
<p>Số điện thoại: {{$bills->phone}}</p>
<p>Địa chỉ : {{$bills->address}}</p>

<table class="table">
    <thead>
    <tr>
        <th scope="col">Sản Phẩm</th>
        <th scope="col">Số lượng</th>
        <th scope="col">Giá</th>

    </tr>
    </thead>
    @foreach($datas as $data)
        <tbody>
        <tr>
            <th scope="row">{{$data->name}}</th>
            <td>{{$data->quantity}}</td>
            <td>{{number_format($data->price)}}</td>
        </tr>

        </tbody>
    @endforeach
</table>
<h1>Tổng tiền : {{number_format(Cart::getTotal())}}VNĐ</h1>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>


</body>
</html>
