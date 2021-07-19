<?php

namespace App\Http\Controllers;

use App\Models\InforFooter;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $infoFooters = InforFooter::all();
        return view('home')->with('infoFooters', $infoFooters);
    }
}
