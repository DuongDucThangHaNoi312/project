<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\InforFooter;
use App\Models\Product;
use Illuminate\Http\Request;

class TrangChuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function home()
    {
        $infoFooters = InforFooter::all();
        $categories = Category::all();
        $products = Product::with('category')
            ->where('category_id', 1)
            ->paginate(6);
//            ->get();
//        echo $categories;
//        die();
        return view('home.trangchu')
            ->with('categories', $categories)
            ->with('products', $products)
            ->with('infoFooters', $infoFooters);
    }

    public function getProduct($id)
    {

        $infoFooters = InforFooter::all();
        $categories = Category::all();
        $products = Product::with('category')
            ->where('category_id', $id)
            ->paginate(6);
//        dd($id);

//        echo($products);
//        die();
        // load the view and pass the product
        return view('home.trangchu')
            ->with('categories', $categories)
            ->with('products', $products)
            ->with('infoFooters', $infoFooters);
    }

}
