<?php

namespace App\Http\Controllers;


//use Darryldecode\Cart\Cart;
use App\Models\InforFooter;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function saveCart(Request $request)
    {
        $categoryId = $request->category_id;

        $productId = $request->productIdHidden;
        $quantity = $request->qty;

        $productCarts = DB::table('products')->where('id', $productId)->first();
//        print_r($dataCarts);
//        die();

//        Cart::add('293ad', 'Product 1', 1, 9.99, 550);
//        Cart::add('293ad', 'Product 1', 1, 9.99, 550);

        $data['id'] = $productCarts->id;
        $data['name'] = $productCarts->name;
        $data['quantity'] = $quantity;
        $data['price'] = $productCarts->price;
        $data['attributes']['image'] = $productCarts->image;
        Cart::add($data);
        return Redirect::to('showCart')->with('categoryId', $categoryId);
    }

    public function showCart()
    {
        $infoFooters = InforFooter::all();
        return view('cart.showCart')->with('infoFooters', $infoFooters);
    }

    public function deleteCart($id)
    {
        Cart::remove($id);
        return view('cart.showCart');
    }


    public function updateCart(Request $request)
    {
        $infoFooters = InforFooter::all();
        $idProductHidden = $request->idProductHidden;
        $quantityProduct = $request->quantity;

//
//        echo $idProductHidden;
//        echo $quantityProduct;
//        die();


        Cart::update($idProductHidden, array(
            'quantity' => array(
                'relative' => false,
                'value' => $quantityProduct,
            ),
        ));

//        $content = Cart::getContent();
//        echo "<pre>";
//        print_r($content);
//        die();

        return view('cart.showCart')
            ->with('infoFooters', $infoFooters);

    }

}
