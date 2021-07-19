<?php

namespace App\Http\Controllers;

use App\Mail\MailNotify;
use App\Models\Bill;
use App\Models\InforFooter;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class EmailController extends Controller
{
    public function sendEmail()
    {

        $datas = Cart::getContent();
        $userId = Auth::user()->id;
        $infoFooters = InforFooter::all();

        $bills = Bill::with('user')
            ->where('user_id', $userId)
            ->orderByDesc('created_at')
            ->first();
//        dd($bills);

        Mail::to("thang312qm@gmail.com")->send(new MailNotify($bills, $datas));
        return view('emails.comfirmPayment')->with('infoFooters', $infoFooters);
    }
}
