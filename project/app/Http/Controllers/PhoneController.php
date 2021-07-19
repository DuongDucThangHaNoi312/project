<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
{


    public function getNameByPhone()
    {


//        sử dụng funtion trong mối quan hê như là 1 thuộc tính
        //từ modelphone sang user lấy ra dữ liệu
        $dl = Phone::with('user')
            ->get();
// trả về kết quả ở bảng phone
        // gọi đến hàm user như thuộc tính để lấy kêt quả bên user
//        dd($dl);

        return view('phoneUser.show')
            ->with('dl', $dl);

    }
}
