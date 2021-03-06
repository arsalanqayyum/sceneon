@extends('layouts.admin-panel.dashboard')

@section('admin-content')
    <div class="main-content">
        <div class="main-content-inner">
            <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="#">Home</a>
                    </li>

                    <li>
                        <a href="#">Add New</a>
                    </li>
                    <li class="active">Simple &amp; Dynamic</li>
                </ul><!-- /.breadcrumb -->

                <div class="nav-search" id="nav-search">
                    <form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
                    </form>
                </div><!-- /.nav-search -->
            </div>
        </div>
        <div class="col-sm-12">
            <form action="{{route('updatepost',$getall->id)}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <h2>Add New Title</h2>
                <h4></h4>
                <input type="text" name="post_title" class="form-control" placeholder="Enter Title Here" value="{{$getall->post_title}}">
                <h2>Enter Description</h2>
                <textarea class="form-control" name="summary" placeholder="Enter Description" rows="10">{{$getall->summary}}</textarea>
                <h2>Short Description</h2>
                <textarea class="form-control" name="cat_desc" placeholder="Enter short Description">{{$getall->cat_desc}}</textarea>
                <textarea class="form-control" name="specification"></textarea>
                <table style="float: left">
                    <tr>
                        <td><h2>Price</h2></td>
                        <td><h2>Discount</h2></td>
                        <td><h2>Stock</h2></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="cat_price" class="form-control" placeholder="Enter Price" value="{{$getall->cat_price}}"></td>
                        <td><input type="text" name="discount" class="form-control" placeholder="Enter Discount" value="{{$getall->discount}}"></td>
                        <td>
                            <select class="form-control" name="stock">
                                <option>{{$getall->stock}}</option>
                                <option>Available</option>
                                <option>Unavailable</option>
                                <option>Under Shipment</option>
                                <option>Discontinue</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><h2>Prod.Cat</h2></td>
                        <td><h2>Brand Title</h2></td>
                        {{--<td><h2>Add New Brand</h2></td>--}}
                    </tr>
                    <tr>
                        <td>
                            <select class="form-control" id="brand" name="prod_cat">
                                @foreach($brand as $post)
                                    <option value="{{$post->id}}" @if($getall->prod_cat == $post->id)selected @endif>{{$post->prod_cat}}</option>
                                @endforeach

                            </select>
                        </td>
                        <td><input type="text" name="brand_title" class="form-control" placeholder="Brand Title" value="{{$getall->brand_title}}"></td>
                        {{--<td><input type="text" name="brand" class="form-control" placeholder="Add New Brand" id="newbrand"></td>--}}
                    </tr>

                    <tr>
                        <td><h2>Category</h2></td>
                        {{--<td><h2>New Category</h2></td>--}}
                    </tr>
                    <tr>
                        <td>
                            <select class="form-control" name="cat_name" id="cat_name">
                                @foreach($category as $post)
                                    <option value="{{$post->id}}" @if($getall->cats_id == $post->id)selected @endif>{{$post->category}}</option>
                                @endforeach
                            </select>
                        </td>
                        {{--<td><input type="text" name="category" class="form-control" placeholder="Add new category" id="newcat"> </td>--}}
                    </tr>
                    <tr>
                        <td><input type="submit" class="btn btn-info" value="Update"></td>
                    </tr>
                </table>
                <div style="float: right">
                    <h2>Product Image</h2>
                    <img src="{{asset('/uploads').'/'.$getall->cat_image}}" class="img-thumbnail" width="200px">
                    <input type="file" name="cat_image" class="btn btn-info">
                </div>

            </form>

        </div>
    </div>
@endsection