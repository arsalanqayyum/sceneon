<?php

namespace App\Http\Controllers;

use App\cart;
use App\categories;
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
        $this->home ='http://'.$_SERVER['HTTP_HOST'].'/sceneon/public';
        $this->forallcats = DB::table('categories')
            ->select(DB::raw('COUNT(*) as counter, cat_name'))
            ->groupby('cat_name')->get();
        $this->brands =  DB::table('categories')->select(DB::raw('COUNT(*) as counter, brand'))->groupby('brand')->get();

    }
    public function slider(){
        $sliders = sliders::all();
        $cats = categories::where('cat_name','new items')->orderBy('created_at', 'desc')->take(4)->get();
        $deal = categories::all()->where('cat_name','hot deals');
        $new_arrivals = categories::all()->where('cat_name','new arrivals');
        $top_brands = topbrands::all();
        return view('home',compact('sliders','cats', 'deal', 'new_arrivals','top_brands'));
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
        $allproducts = DB::table('categories')->where('cat_name',$category)->paginate(12);/*categories::all()->where('cat_name', $category)*/;
        $sidecats = $this->forallcats;
        /*$brands = DB::table('categories')->select('brand','brand_title')->where('brand_title','=','')->get();*/
        $brands = $this->brands;
        return view('products',compact( 'ghar','sidecats', 'allproducts','brands'));
    }

    public function getcats($cats){
        $brands = $this->brands;
        $ghar = $this->home;
        $sidecats = $this->forallcats;
        $allproducts = categories::all()->where('cat_name', $cats);
        return view('cats',compact('allproducts','ghar','sidecats','brands'));
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
//        dd($request->session()->get('cart'));
        return redirect()->back();
//        echo json_encode($cart);
    }

    public function mycart(Request $request){
        if(!Session::has('cart')){
            return redirect()->back()->with('msg','Cart is Empty! Please add items to cart');
        }

        $oldcart = $request->session()->get('cart'); //Session::get('cart');
        $cart = new cart($oldcart);
/*        $product = ['product'=>$cart->items,'totalprice'=>$cart->totalPrice];*/
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
        $order->email = $request['email'];
        $order->address = $request['address'];
        $order->user_order = serialize($cart);
/*        Auth::user()->orders()->save($order);*/
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
            Session::has('cart') ? Session::forget('cart') : null;
            echo json_encode([
                'msg' => '<span class="alert alert-success" role="alert">Your cart has been empty</span>',
                'msg_container' => '.cart_table',
                'total_qty' => '0'
            ]);
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
            return view ('404')->withMessage('No Details found. Try to search again !');
        }
    }

}
