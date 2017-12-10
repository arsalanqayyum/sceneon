<?php
use Illuminate\Support\Facades\Input;
use App\categories;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/','for_slider@slider');

Route::get('/shoppingcart','for_slider@mycart');
Route::get('/shoppingcart/{flag}','for_slider@cartSessionRemoval');

Route::get('/checkout','for_slider@checkout');

Route::post('/checkout',[
    'uses'=>'for_slider@postcheckout',
    'as' => 'getout'
]);

Route::get('/{id}', 'for_slider@getpost');

Route::get('/products/{category}','for_slider@viewall');


Route::get('/cats/{cats}','for_slider@getcats');

Route::get('/brands/{brand}', 'for_slider@getbrands');

Route::get('/add-to-cart/{id}',[
    'uses' => 'for_slider@getcart',
    'as' => 'addtocart'
]);
Route::get('/add-to-cart/{id}/{qty}',[
    'uses' => 'for_slider@getcart',
    'as' => 'addtocart'
]);

Route::get('/reduced/{id}',[
    'uses'=>'for_slider@getreducedbyone',
    'as' => 'reducedbyone'
]);

Route::get('/removeall/{id}',[
    'uses' => 'for_slider@getremoveall',
    'as' => 'removeall'
]);

/*Route::any('/search',function(){
    $q = Input::get ( 'q' );
    $user = categories::where('post_title','LIKE','%'.$q.'%')->get();
    if(count($user) > 0){
        return view('search')->withDetails($user)->withQuery ( $q );}
    else{ return view ('search')->withMessage('No Details found. Try to search again !');}
});*/

Route::any('/search','for_slider@search');

