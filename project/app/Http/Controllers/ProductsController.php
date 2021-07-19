<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\InforFooter;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Result;

class ProductsController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // get all the product
        $products = Product::with('category')
//            ->get()
            ->orderBy('name')
            ->paginate(5);
//->first();


//        echo($products);
//        dd();

        // load the view and pass the product

        return view('products.show')->with('products', $products)
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
//        dd($categories);

//        foreach ($categories as $key => $category) {
//         echo $key;
//        }
//        die();
        return view('products.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:6',
            'image' => 'required|image|file', // định dang là ảnh
        ]);

        // lấy từ input
        $avataruploaded = request()->file('image');

        //tên ảnh
        $avatarname = time() . '.' . $avataruploaded->getClientOriginalExtension();
//        dd($avatarname);

        //link ảnh
        $avatarpath = public_path('/images/');
//        dd($avatarpath);


        // upload
        $avataruploaded->move($avatarpath, $avatarname);
//        dd($avataruploaded);


        $products = new Product;
        $products->name = $request->name;
        $products->image = $avatarname;
        $products->category_id = $request->category_id;


        $products->save();


        // hoặc
//        $products = Product::create($validatedData);

        return redirect()->route('product.index')->with('createsuccess', 'Tạo thành công');
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function show($id)
    {
        $products = Product::findOrFail($id);
//        var_dump($products ->id);
//        var_dump($products ->name);
//        die();

        return view('products.showdetails')->with('products', $products);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function edit($id)
    {
//        $product = Product::findOrFail($id);
        $product = Product::findOrFail($id);
        $categories = Category::pluck('name', 'id');

//        dd($product->category->name );

        return view('products.edit')
            ->with('product', $product)
            ->with('categories', $categories);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request, $id)
    {


        $validatedData = $request->validate([
            'name' => 'required|min:6',
        ]);
//

        $product = Product::findOrFail($id);
//        $products = new Product;
        $product->name = $request->name;
        $product->category_id = $request->category_id;


        // lấy từ input
        // nếu upload ảnh mới
        if ($avataruploaded = request()->file('image')) {
            $avatarname = time() . '.' . $avataruploaded->getClientOriginalExtension();
            $avatarpath = public_path('/images/');
            // upload
            $avataruploaded->move($avatarpath, $avatarname);
            $product->image = $avatarname;
        } // nếu không upload ảnh thì laấy ảnh cũ
        else {
            $product->image = $request->image_old;
        }


        $product->save();

        // hoặc
//        $products = Product::updated($validatedData );

        return redirect()->route('product.index')->with('editsuccess', 'Update thành công');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        $products = Product::findOrFail($id);
        $products->delete();

        return redirect()->route('product.index')->with('deletesuccess', 'Xóa Thành Công');

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
     */
    public function searchProduct(Request $request)
    {

        $key = $request->keysearch;
        $products = Product::where('name', 'like', "%$key%")
//            ->get();
            ->paginate(5);

        return view('products.search')
            ->with('products', $products)
            ->with('key', $key);

    }

//    public function getProductByCategory()
//    {
//        $products = Product::with('category')
//            ->where('category_id', 1)
//            ->get();
//
//        // load the view and pass the product
//
////     echo $products
//    }


    public function showCart()
    {

        $infoFooters = InforFooter::all();
        $dataCarts = session()->get('cart');

        return view('cart.showCart')
            ->with('dataCarts', $dataCarts)
            ->with('infoFooters', $infoFooters);
    }


    public function detailProduct($id, Request $request)
    {
        $categoryId = $request->categoryId;
//        $id = $request->productIdHidden;
//        echo $categoryId;
//        echo $id;
//        die();

        $infoFooters = InforFooter::all();
        $COMMENTS = Comment::with('user')->orderByDesc('created_at')->get();
        $productDetail = DB::table('products')->where('id', $id)->get();


        $productRelates = DB::table('products')->whereNotIn('id',[$id])->where('category_id',$categoryId)->paginate(3);

        return view('products.detailProduct')
            ->with('productDetail', $productDetail)
            ->with('productRelates', $productRelates)
            ->with('infoFooters', $infoFooters)
            ->with('COMMENTS', $COMMENTS);

    }

    public function searchProductAtHome(Request $request)
    {
        $key = $request->keySearch;
        $productSearchs = Product::where('name', 'like', "%$key%")
            ->paginate(6);

        $infoFooters = InforFooter::all();
        $categories = Category::all();
        return view('home.search')
            ->with('categories', $categories)
            ->with('productSearchs', $productSearchs)
            ->with('key', $key)
            ->with('infoFooters', $infoFooters);
    }

}
