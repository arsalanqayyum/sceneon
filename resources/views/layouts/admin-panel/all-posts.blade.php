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

        <div class="conrtainer">
            @if(session()->has('message'))
                <div class="alert alert-success alert-dismissable" style="margin-top:15px">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <strong>{{session()->get('message')}}</strong>
                </div>
            @endif
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
                    <td>{{$getpost->category}}</td>
                    <td>{{$getpost->cat_price}}</td>
                    <td><img src="{{asset('/uploads').'/'.$getpost->cat_image}}" width="100px"></td>
                    <td>{{$getpost->created_at}}</td>
                    <td>
                        <a href="{{route('edit',$getpost->id)}}" class="btn btn-sm btn-success"><i class="fa fa-check"></i></a>
                        <a href="#" data-toggle="modal" data-target="#deleteModal_{{$getpost->id}}" class="btn btn-sm btn-danger"><i class="fa fa-close"></i></a>
                    </td>
            </tr>

                <!-- Delete Modal -->
                <form method="GET" action="{{route('delete',$getpost->id)}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div id="deleteModal_{{$getpost->id}}" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Delete Slider</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to delete this Post?</p>



                                </div>
                                <div class="modal-footer">
                                    <input type="submit" value="Yes" class="btn btn-success">
                                    <input type="button" value="No" class="close btn btn-danger" data-dismiss="modal">
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
                <!-- Delete Modal End -->

            @endforeach
        </table>
        <div style="margin: auto; display: block;text-align: center">
            {{$allposts->links()}}
        </div>

    </div>
@endsection