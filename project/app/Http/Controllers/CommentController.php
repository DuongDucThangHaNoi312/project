<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\InforFooter;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all the product
//        $comment = Comment::with('product')
//            ->get();
//      return view('products.detailProduct');

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

        $comment = new Comment();
        $comment->name = $request->nameUserHidden;
        $comment->content = $request->content;
        $comment->idProduct = $request->productIdHidden;
        $comment->user_id = $request->userIdHidden;
        $comment->save();

        $id = $request->productIdHidden;
        $categoryId = $request->categoryIdHidden;

        $infoFooters = InforFooter::all();
        $COMMENTS = Comment::with('user')->orderByDesc('created_at')->get();
        $productDetail = DB::table('products')->where('id', $id)->get();


        $productRelates = DB::table('products')->whereNotIn('id',[$id])->where('category_id', $categoryId)->paginate(3);

        return view('products.detailProduct')
            ->with('productDetail', $productDetail)
            ->with('productRelates', $productRelates)
            ->with('infoFooters', $infoFooters)
            ->with('COMMENTS', $COMMENTS);
//        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
}
