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
                        <a href="#">Tables</a>
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

        <table class="table table-bordered">
            <tr>
                <th>Posts</th>
                <th>Description</th>
                <th>Category</th>
                <th>Price</th>
                <th>Image</th>
                <th>Created at</th>
                <th>Action</th>
            </tr>
            @foreach($allposts as $getpost)
            <tr>
                    <td>{{$getpost->post_title}}</td>
                    <td>{{$getpost->cat_desc}}</td>
                    <td>{{$getpost->cat_name}}</td>
                    <td>{{$getpost->cat_price}}</td>
                    <td><img src="{{$getpost->cat_image}}" width="100px"></td>
                    <td>{{$getpost->created_at}}</td>
                    <td>
                        <a href="{{route('edit',$getpost->id)}}" class="btn btn-sm btn-success"><i class="fa fa-check"></i></a>
                        <a href="" class="btn btn-sm btn-danger"><i class="fa fa-close"></i></a>
                    </td>
            </tr>
            @endforeach
        </table>
        <div style="margin: auto; display: block;text-align: center">
            {{$allposts->links()}}
        </div>

    </div>
@endsection