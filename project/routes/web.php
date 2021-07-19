<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Mail\MailNotify;

Route::get('/demo', function () {
  echo "hello";
})->name('demo');

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/product', 'ProductsController')->middleware(['auth','role:1']);

//Route::get('/search', 'ProductsController@searchProduct')->name('searchProduct');
Route::post('/searchProduct', 'ProductsController@searchProduct')->name('searchProduct');

Route::resource('/category', 'CategoryController')->middleware(['auth','role:1']);
Route::resource('/linkfooter', 'LinkFooterController')->middleware(['auth','role:1']);


Route::post('/searchCategory', 'CategoryController@searchCategory')->name('searchCategory');

Route::get('/phone', 'PhoneController@getNameByPhone');

Route::get('/trangchu', 'TrangChuController@home')->name('trangchu');
Route::get('/getProduct/{id}', 'TrangChuController@getProduct')->name('getProductByCategory');

Route::get('/product/addToCart/{id}', 'ProductsController@addToCart')->name('addToCart');


Route::get('showCart', 'ProductsController@showCart')->name('showCart');
//Route::get('updateCart', 'ProductsController@updateCart')->name('updateCart');
//Route::get('deleteCart', 'ProductsController@deleteCart')->name('deleteCart');


Route::post('/saveCart','CartController@saveCart')->name('saveCart');


//Route::get('/detailProduct', 'ProductsController@detailProduct')->name('detailProduct');
//Route::post('/detailProduct', 'ProductsController@detailProduct')->name('detailProduct');

Route::get('/detailProduct/{id}', 'ProductsController@detailProduct')->name('detailProduct');
Route::post('/detailProduct/{id}', 'ProductsController@detailProduct')->name('detailProduct');


Route::post('/searchProductAtHome', 'ProductsController@searchProductAtHome')->name('searchProductAtHome');

Route::resource('/comment', 'CommentController');

Route::post('/saveCart', 'CartController@saveCart')->name('saveCart');
Route::post('/showCart', 'CartController@showCart')->name('showCart');
Route::get('/deleteCart/{id}', 'CartController@deleteCart')->name('deleteCart');
Route::post('/updateCart', 'CartController@updateCart')->name('updateCart');

Route::get('/checkOut', 'CheckoutController@checkOut')->name('checkOut');
Route::get('/comfirmcheckOut', 'CheckoutController@comfirmcheckOut')->name('comfirmcheckOut');
Route::post('/savecheckOut', 'CheckoutController@savecheckOut')->name('savecheckOut');
Route::get('/getBills', 'CheckoutController@getBills')->name('getBills');


//Route::get('/sendMail', 'CheckoutController@sendMail')->name('sendMail');
Route::get('sendEmail', 'EmailController@sendEmail')->name('sendEmail');





