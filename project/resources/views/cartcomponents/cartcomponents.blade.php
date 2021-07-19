<div class="container cart mb-4 " data-url = {{ route('deleteCart') }}  >
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped updateCartUrl" data-url="{{route('updateCart')}}">
                    <thead>
                    <tr>
                        <th scope="col"> STT</th>
                        <th scope="col">Image</th>
                        <th scope="col">Product</th>
                        <th scope="col" class="text-center">Quantity</th>
                        <th scope="col" class="text-right">Price</th>
                        <th scope="col" class="text-right">Total Price</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $stt = 1;
                        $total= 0;
                    @endphp

                    @if(isset($dataCarts))

                        @foreach($dataCarts as $dataCart)
                            <tr>

                                @php

                                    $total +=  $dataCart['price']*$dataCart['quantity'];
                                @endphp
                                <td>{{$stt}}</td>
                                <td><img style="width: 100px; height: 100px ;"
                                         src="{{ url('/images/'.$dataCart['image'])}}"></td>
                                <td>{{$dataCart['name']}}</td>
                                <td><input class="form-control quantity" min="1" type="number"
                                           value="{{$dataCart['quantity']}}"/></td>
                                <td class="text-right">{{number_format($dataCart['price'])}} VNĐ</td>
                                <td class="text-right">{{number_format($dataCart['price']*$dataCart['quantity'])}}
                                    VNĐ
                                </td>
                                <td class="text-right">
                                    <a  data-id="{{ $stt }}" class="btn btn-sm btn-warning cartUpdate" id="link"><i
                                            class="fas fa-sync-alt"></i></a>
                                </td>
                                <td class="text-right">
                                    <a data-id="{{ $stt }}" class="btn btn-sm btn-danger cartDelete"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>

                            @php($stt++)
                        @endforeach

                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="font-weight: bold">Sub-Total</td>
                            <td class="text-right">{{number_format($total)}} VNĐ</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="font-weight: bold">Shipping</td>
                            <td class="text-right">6,90 VNĐ</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td class="text-right"><strong>346,90 VNĐ</strong></td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <a href="{{route('trangchu')}}" class="btn btn-block btn-light">Continue Shopping </a>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                    <a class="btn btn-block btn-success ">Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>


