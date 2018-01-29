<?php

namespace App\Http\Controllers;

use App\brands;
use App\cats;
use App\Http\Requests;
use App\orders;
use App\sliders;
use App\topbrands;
use Illuminate\Http\Request;
use App\categories;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $home;
    public function __construct()
    {
        $this->middleware('auth');
        $this->home ='http://'.$_SERVER['HTTP_HOST'].'/sceneon.git/public';
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


    public function adminallposts()
    {
        $allposts = DB::table('categories')->JOIN('cats','categories.cats_id','=','cats.id')->SELECT('categories.*', 'cat_image','cat_price','cat_desc','cats.category','post_title')->latest()->paginate(6);
        return view('layouts.admin-panel.all-posts',compact('allposts'));
    }


    public function addnew(Request $request){
        /*$addnew = DB::table('categories')->groupby('brand')->get();*/
        $category = cats::all();
        $brands = brands::all();
        return view ('layouts.admin-panel.add-new',compact('brands','category'));
    }

    public function insert(Request $request){

        $post = new categories;
        $file = $request->file('cat_image');
        $filename = $file->getClientOriginalName();
        storage::put('uploads/' . $filename,file_get_contents($request->file('cat_image')->getRealPath()));
        $post->post_title = Input::get('post_title');
        $post->summary = Input::get('summary');
        $post->cat_desc = Input::get('cat_desc');
        $post->cat_price = Input::get('cat_price');
        $post->discount = Input::get('discount');
        $post->stock = Input::get('stock');
        $post->prod_cat = Input::get('brand');
        $post->brand_title = Input::get('brand_title');
        $post->cats_id = Input::get('cat_name');
        $post->cat_image = $filename;
        $post->save();
        $request->session()->flash('message','Post Successfully Added!');
        return redirect()->route('edit',$post->getQueueableId());
    }

    public function edit($id){
        $getall = DB::table('categories')->find($id);
        $category = cats::all();
        $brand = brands::all();
        $join = DB::table('categories')->join('cats','categories.cats_id','=','cats.id')->where('categories.id','=',$id);
        return view('layouts.admin-panel.edit',compact('getall','category','brand','getid','join'));
    }


    public function update($id, Request $request){
       /* $postdata = $request->except(['_token']);*/
        $post = categories::query()->findOrFail($id);
        if ($request->hasFile('cat_image')) {
            $file = $request->file('cat_image');
            $filename = $file->getClientOriginalName();
            storage::put('uploads/' . $filename, file_get_contents($request->file('cat_image')->getRealPath()));
            $post->cat_image = $filename;
        }
        $post->post_title = Input::get('post_title');
        $post->summary = Input::get('summary');
        $post->cat_desc = Input::get('cat_desc');
        $post->cat_price = Input::get('cat_price');
        $post->discount = Input::get('discount');
        $post->stock = Input::get('stock');
        $post->brand_title = Input::get('brand_title');
        $post->cats_id = Input::get('cat_name');
        $post->prod_cat = Input::get('prod_cat');
        $post->save();
        $request->session()->flash('message','Post Successfully Updated!');
        return redirect()->back()->withInput();
    }

    public function deletepost($id,Request $request){
        DB::table('categories')->delete($id);
        $request->session()->flash('message','Post Successfully Deleted!');
        return redirect()->back();
    }

    public function allslider(){
        $ghar = $this->home;
        $getslider = sliders::all();
        return view('layouts.admin-panel.all-slider',compact('getslider','ghar'));
    }

    public function insertslider(Request $request){

        $post = new sliders;
        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        storage::put('slider/' . $filename, file_get_contents($request->file('image')->getRealPath()));
        $post->image = $filename;
        $post->index = Input::get('index');
        $post->save();
        $request->session()->flash('message', 'Slider successfully Added!');
        return redirect()->route('allslider');
    }

    public function editslider($id){
        $post = DB::table('sliders')->find($id);

        return $post;
    }

    public function updateslider($id,Request $request){
        $post = sliders::query()->findOrFail($id);
        if($request->hasfile('image')){
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            storage::put('/slider'.$filename,file_get_contents($request->file('image')->getRealPath()));
            $post->image = $filename;
        }
        $post->index = Input::get('index');
        $post->save();
        $request->session()->flash('message', 'Slider successfully Updated!');
        return redirect()->route('allslider');
    }

    public function deleteslider($id,Request $request){
        DB::table('sliders')->delete($id);
        $request->session()->flash('message', 'Slider successfully Deleted!');
        return redirect()->route('allslider');
    }

    public function getallbrands(){
        $allbrands = topbrands::all();
        return view('layouts.admin-panel.top-brands',compact('allbrands'));
    }

    public function insertbrand(Request $request){
        $post = new topbrands;
        $file = $request->file('brand_img');
        $filename = $file->getClientOriginalName();
        storage::put('brands/'.$filename,file_get_contents($request->file('brand_img')->getRealPath()));
        $post->brand_img = $filename;
        $post->save();
        $request->session()->flash('message', 'Record successfully added!');
        return redirect()->back();
    }

    public function editbrand($id){
       $post = DB::table('topbrands')->find($id);
       return $post;
    }

    public function updatebrand($id,Request $request){
        $post = topbrands::query()->findOrFail($id);
        if($request->hasfile('brand_img')){
            $file = $request->file('brand_img');
            $filename = $file->getClientOriginalName();
            storage::put('brands/'.$filename,file_get_contents($request->file('brand_img')->getRealPath()));
            $post->brand_img = $filename;
        }
        $post->title = Input::get('title');
        $post->save();
        $request->session()->flash('message', 'Record successfully Updated');
        return redirect()->back();
    }

    public function deletebrand($id,Request $request){
        DB::table('topbrands')->delete($id);
        $request->session()->flash('message', 'Record successfully Deleted');
        return redirect()->back();
    }

    public function allorders(){
        $order = DB::table('orders')->where('status','=','')->latest()->get();
        if(!empty($order)){
            return view('layouts.admin-panel.order',compact('order'));
        }else{
            Session::flash('msg', 'No New Order Found!');
            return view('layouts.admin-panel.order',compact('order'));
        }
        }


    public function vieworder($id,Request $request){
        $vieworder = orders::query()->findOrFail($id);
        $vieworder->user_order = unserialize($vieworder->user_order);
        return view('layouts.admin-panel.view-order',compact('vieworder'));
    }

    public function updatestatus($id){
        $vieworder = orders::query()->findOrFail($id);
        $vieworder->status = input::get('status');
        $vieworder->save();
        return redirect()->back();
    }

    public function deleteorder($id){
        DB::table('orders')->delete($id);
        Session::flash('msg','Record deleted');
        return redirect()->back();
    }

    public function filter(Request $request){
        $status = $request->get('status');
       $order = orders::where('status','=', $status)->latest()->get();
        return view('layouts.admin-panel.order',compact('order'));
    }

    public function allcategories(){
        $getcats = cats::all();
        return view('layouts.admin-panel.categories',compact('getcats'));
    }

    public function insertcategory(){
        $newcat = new cats();
        $newcat->category = Input::get('cat');
        $newcat->save();
        session::flash('msg','Category Insert Successfully!');
        return redirect()->back();
    }

    public function editcat($id){
        $editcat = cats::query()->findOrFail($id);
        $editcat->category = Input::get('cat');
        $editcat->save();
        session::flash('msg','Category Edit Successfully!');
        return redirect()->back();
    }

    public function delete($id){
        DB::table('cats')->delete($id);
        session::flash('msg','Category Deleted Successfully!');
        return redirect()->back();
    }

    public function prodcat(){
        $prodcat = brands::all();
        return view('layouts.admin-panel.prodcats',compact('prodcat'));
    }

    public function insertprodcategory(){
        $newcat = new brands();
        $newcat->prod_cat = Input::get('cat');
        $newcat->save();
        session::flash('msg','Category Insert Successfully!');
        return redirect()->back();
    }

    public function deleteprodcat($id){
        DB::table('brands')->delete($id);
        session::flash('msg','Category Deleted Successfully!');
        return redirect()->back();
    }
}
