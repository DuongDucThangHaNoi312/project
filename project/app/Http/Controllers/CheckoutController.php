<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\InforFooter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CheckoutController extends Controller
{
    public function checkOut()
    {
        $infoFooters = InforFooter::all();
        return view('cart.checkout')->with('infoFooters',$infoFooters);
    }

    public function comfirmcheckOut()
    {
        $infoFooters = InforFooter::all();
        return view('cart.comfirmCheckout')->with('infoFooters',$infoFooters);
    }

    public function savecheckOut(Request $request)
    {
        $bill = new Bill();
        $bill->user_id = $request->user_id;
        $bill->name = $request->name;
        $bill->phone = $request->phone;
        $bill->address = $request->address;
        $bill->save();
        return Redirect::to('sendEmail');

    }

    public function getBills()
    {
        $bills = Bill::with('user')->get();
        echo $bills;

    }


}
