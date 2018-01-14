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

/*Route::get('/', function () {
    return view('home');
});*/

Route::get('/form', [
    'uses' => 'HomeController@post',
    'as'    => 'posts'
]);

Route::get('/all-posts', [
    'uses' => 'HomeController@adminallposts',
    'as'    => 'allposts'
]);

Route::get('/add-new',[
    'uses' => 'HomeController@addnew',
    'as' => 'addnew'
]);

Route::post('/insert',[
   'uses'=>'HomeController@insert',
   'as' => 'insert'
]);

Route::get('/edit/{id}',[
   'uses'=>'HomeController@edit',
   'as' => 'edit'
]);

Route::post('/update/{id}',[
   'uses' => 'HomeController@update',
   'as' => 'update'
]);

Route::get('/delete-post/{id}',[
    'uses' => 'HomeController@deletepost',
    'as'    => 'delete'
]);

Route::get('/all-slider',[
   'uses' => 'HomeController@allslider',
   'as' => 'allslider'
]);

Route::post('/add-slider',[
    'uses' => 'HomeController@insertslider',
    'as' => 'insertslider'
]);
Route::get('/edit-slider/{id}',[
    'uses' => 'HomeController@editslider',
    'as' => 'editslider'
]);

Route::post('/update-slider/{id}',[
    'uses' => 'HomeController@updateslider',
    'as' => 'updateslider'
]);

Route::get('/delete-slider/{id}',[
    'uses' => 'HomeController@deleteslider',
    'as'    => 'delete'
]);

Route::get('/top-brands',[
    'uses'  => 'HomeController@getallbrands',
    'as'    => 'brands'
]);

Route::post('/insert-brand',[
    'uses' => 'HomeController@insertbrand',
    'as'    => 'insertbrand'
]);

Route::get('/edit-brand/{id}',[
    'uses'  => 'HomeController@editbrand',
    'as'    => 'editbrand'
]);

Route::post('/update-brand/{id}',[
    'uses'  => 'HomeController@updatebrand',
    'as'    => 'updatebrand'
]);

Route::get('delete-brand/{id}',[
    'uses'  => 'HomeController@deletebrand',
    'as'    => 'deletebrand'
]);

Route::get('delete-slider/{id}',[
    'uses'  => 'HomeController@deleteslider',
    'as'    => 'deleteslider'
]);

Route::get('orders',[
    'uses'  => 'HomeController@allorders',
    'as'    => 'orders'
]);

Route::get('view-order/{id}',[
    'uses'  => 'HomeController@vieworder',
    'as'    =>  'vieworder'
]);

Route::auth();

Route::get('/lvl-admin', 'HomeController@index');

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



Route::any('/search','for_slider@search');








