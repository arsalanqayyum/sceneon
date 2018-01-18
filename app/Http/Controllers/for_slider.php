<?php

namespace App\Http\Controllers;

use App\cart;
use App\categories;
use App\cats;
use App\sliders;
use App\topbrands;
use Illuminate\Http\Request;
use App\orders;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class for_slider extends Controller
{

    public $home, $forallcats, $brands;
    function __construct(){
        $this->home ='http://'.$_SERVER['HTTP_HOST'].'/sceneon.git/public';
        $this->forallcats = DB::table('cats')->JOIN('categories','cats.id','=','categories.cats_id')->select(DB::raw('count(*) as counter,cats_id'),'cats.category')->groupby('categories.cats_id')->get();
        $this->brands =  DB::table('categories')->select(DB::raw('COUNT(*) as counter, brand'))->groupby('brand')->get();

    }
    public function slider(){
        $ghar = $this->home;
        $sliders = sliders::all();
/*        $cats = DB::table('categories')->JOIN ('cats','cats.id','=','categories.cats_id')->SELECT ('categories.*', 'cat_image','cat_price','cat_desc','cats_id')->take(4)->get();*/
        $catsname = cats::all();
        $cats = categories::where('cats_id','=',1)->take(4)->get();
        $deal = categories::where('cats_id','=',2)->take(3)->get();
        $new_arrivals = categories::where('cats_id','=',3)->get();
        $top_brands = topbrands::all();
        return view('home',compact('sliders','cats', 'deal', 'new_arrivals','top_brands','catsname','ghar'));
    }

    public function getpost($id){
        $getposts = DB::table('categories')->where('id', '=', $id)->first();

        $related_products =
            DB::table('categories')
            ->where('cat_name','=',DB::table('categories')
                ->select('cat_name')
                ->where('id','=',$id)
                ->get()[0]->cat_name)
            ->whereNotIn('id', [$id])->latest()->take(4)
            ->get();
        return view('single',compact('getposts','related_products'));
    }

    public function viewall($category){
        $ghar = $this->home;
        /*$allproducts = DB::table('categories')->where('cat_name',$category)->paginate(12);/*categories::all()->where('cat_name', $category)*/
        $allproducts = DB::table('categories')->JOIN('cats','categories.cats_id','=','cats.id')->SELECT('categories.*', 'cat_image','cat_price','cat_desc','cats_id', 'category')->where('cats.category','=',$category)->paginate(10);
        $sidecats = $this->forallcats;
        $brands = $this->brands;
        $catsname = '';
        return view('products',compact( 'ghar','sidecats', 'allproducts','brands','catsname', 'category'));
    }



    public function getbrands($brand){
        $brands = $this->brands;
        $ghar = $this->home;
        $sidecats = $this->forallcats;
        $allproducts = categories::all()->where('brand', $brand);
        return view('brands',compact('allproducts','ghar','sidecats','brands'));
    }

    public function getcart(Request $request,$id, $qty = 1){
        $product = categories::find($id);
        $oldcart = Session::has('cart') ? Session::get('cart'):null;
        $cart = new cart($oldcart);
        for($i = 0; $i < $qty; $i++){
            $cart->add($product,$product->id);
        }

        $request->session()->put('cart',$cart);
//
        echo json_encode($cart);
    }

    public function mycart(Request $request){
        if(!Session::has('cart')){
            return redirect()->back()->with('msg','Cart is Empty! Please add items to cart');
        }

        $oldcart = $request->session()->get('cart'); //Session::get('cart');
        $cart = new cart($oldcart);

        return view('shoppingcart', ['product'=>$cart->items,'totalPrice'=>$cart->totalPrice, 'totalQty'=>$cart->totalQty]);
    }

    public function checkout(){
        if(!Session::has('cart')){
            return redirect()->back()->with('error','something went wrong');
        }
        $oldcart = Session::get('cart');
        $cart = new cart($oldcart);
        $total = $cart->totalPrice;
        return view('checkout', ['total'=>$total]);
    }

    public function postcheckout(Request $request){
        if(!Session::has('cart')){
            return view('shoppingcart');
        }
        $oldcart = Session::get('cart');
        $cart = new cart($oldcart);
        $order = new orders;
        $order->name = $request['name'];
        $order->lastname = $request['lastname'];
        $order->email = $request['email'];
        $order->address = $request['address'];
        $order->cell    = $request['cell'];
        $order->phone   = $request['phone'];
        $order->cnic    = $request['cnic'];

        $item_details['totalQty'] = $cart->totalQty;
        $item_details['totalPrice'] = $cart->totalPrice;
        $item_details['items'] = [];
        foreach ( $cart->items as $item ) {
            $temp = [];
            $temp['qty'] = $item['qty'];
            $temp['price'] = $item['price'];
            $temp['id'] = $item['item']->id;
            $temp['brand'] = $item['item']->brand;
            $temp['brand_title'] = $item['item']->brand_title;
            $temp['brand_cat'] = $item['item']->brand_cat;
            $temp['cats_id'] = $item['item']->cats_id;
            $temp['cat_desc'] = $item['item']->cat_desc;
            $temp['cat_price'] = $item['item']->cat_price;
            $temp['cat_image'] = $item['item']->cat_image;
            $temp['post_title'] = $item['item']->post_title;
            $temp['discount'] = $item['item']->discount;
            array_push($item_details['items'], $temp);
        }


        $order->user_order = serialize($item_details);

        $order->save();

        $encoding = "utf-8";
        $subject_preferences = array(
            "input-charset" => $encoding,
            "output-charset" => $encoding,
            "line-length" => 76,
            "line-break-chars" => "\r\n"
        );
        $from_name = 'Sceneon';
        $from_mail = 'kariyaqayyum@gmail.com';
        $mail_subject = 'An order has been placed.';
        $mail_to = 'marsalan_qayyum@hotmail.com';
        $header = "Content-type: text/html; charset=".$encoding." \r\n";
        $header .= "From: ".$from_name." <".$from_mail."> \r\n";
        $header .= "MIME-Version: 1.0 \r\n";
        $header .= "Content-Transfer-Encoding: 8bit \r\n";
        $header .= "Date: ".date("r (T)")." \r\n";
        $header .= iconv_mime_encode("Subject", $mail_subject, $subject_preferences);
        $mail_message = '<pre>'.var_dump($cart).'</pre>';
        mail($mail_to, $mail_subject, $mail_message, $header);


        Session::forget('cart');
        return \redirect('/')->with('checkout','Thank you for shopping with us. Your order Placed Successfully ');
    }

    public function getreducedbyone(Request $request,$id){
        $oldcart = $request->session()->has('cart') ? $request->session()->get('cart'):null;
        $cart = new cart($oldcart);
        $cart->reducedbyone($id);
        if(count($cart->items) > 0){
           $request->session()->put('cart',$cart);
        }else{
            $request->session()->forget('cart');
            return \redirect('/');
        }
        return \redirect('shoppingcart');


    }


    public function cartSessionRemoval($flag){
        if( $flag == 'cartempty' ){
            if( Session::has('cart') ) {
                Session::forget('cart');
                echo json_encode([
                    'msg' => '<span class="alert alert-success" role="alert">Your cart has been empty</span>',
                    'msg_container' => '.cart_table',
                    'total_qty' => '0'
                ]);
            } else{
                return \redirect('/');
            }
        }
    }

    public function getremoveall($id){
        $oldcart = Session::has('cart') ? Session::get('cart'):null;
        $cart = new cart($oldcart);
        $cart->removeall($id);
        if(count($cart->items) > 0){
            Session::put('cart',$cart);
        }else{
            Session::forget('cart');
            return \redirect('/');
        }
        return \redirect('shoppingcart');

    }

    public function search(){
        $ghar = $this->home;
        $sidecats = $this->forallcats;
        $brands = $this->brands;
        $q = Input::get ( 'q' );
        $user = categories::where('post_title','LIKE','%'.$q.'%')->get();
        if(count($user) > 0){
            return view('search',compact('sidecats','brands','ghar'))->withDetails($user)->withQuery ( $q );
        }
        else{
            return view ('errors.503')->withMessage('No Details found. Try to search again !');
        }
    }



}
