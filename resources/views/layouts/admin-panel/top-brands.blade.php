
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
            <div class="container">
            <ul class="list-inline">
                @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissable" style="margin-top:45px">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <strong>{{session()->get('message')}}</strong>
                    </div>
                @endif
                <li style="margin-top: 15px; margin-bottom: 15px; float: left"><h3>{{$allbrands->pluck('title')[0]}}</h3>
                    <a href="" data-toggle="modal" data-target="#titleModal" class="btn btn-sm btn-info" >Edit</a></li>
                <li style="margin-top: 15px; margin-bottom: 15px; float: right"><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" >Add New</button></li>
            </ul>

                @foreach($allbrands as $getpost)

                <table class="table table-bordered">
                <tr>
                    <th>IDs</th>
                    <th>Image</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
                    <tr>
                        <td>{{$getpost->id}}</td>
                        <td><img src="{{asset('/brands').'/'.$getpost->brand_img}}" width="100px"></td>
                        <td>{{$getpost->created_at}}</td>
                        <td>
                            <a href="{{route('editbrand',$getpost->id)}}" data-toggle="modal" data-target="#editModal_{{$getpost->id}}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                            <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal_{{$getpost->id}}"><i class="fa fa-close"></i></a>
                        </td>
                    </tr>

            </table>
                    <!-- Edit Modal -->
                    <form method="POST" action="{{route('updatebrand',$getpost->id)}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div id="editModal_{{$getpost->id}}" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Modal Header</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Select file to upload</p>

                                        <input type="file" name="brand_img">
                                        <label>Image</label>
                                        <img src="{{asset('/brands').'/'.$getpost->brand_img}}" width="200px">
                                        <label>Set Index for Scrolling</label>

                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" value="Update" class="btn btn-default">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                    <!-- Edit Modal End -->




                    <!-- Delete Modal -->
                    <form method="GET" action="{{route('deletebrand',$getpost->id)}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div id="deleteModal_{{$getpost->id}}" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Delete Brand</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete this brand?</p>
                                        <img src="{{asset('/brands').'/'.$getpost->brand_img}}">


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

                    <!-- Edit Page title -->
                    <form method="POST" action="{{route('updatebrand',$getpost->id)}}">
                        {{csrf_field()}}
                        <div id="titleModal" class="modal fade" role="dialog">

                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Modal Header</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Change Content Heading</p>


                                        <label>Content Title</label>

                                        <input type="text" name="title" placeholder="insert title" value="{{$getpost->title}}">

                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" value="Update" class="btn btn-default">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                    <!-- Edit Page Title End -->

                @endforeach


        </div>
    </div>




    <!--Insert Modal -->
    <form method="POST" action="{{route('insertbrand')}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                        <p>Select file to upload</p>
                        <input type="file" name="brand_img">

                    </div>
                    <div class="modal-footer">
                        <input type="submit" value="submit" class="btn btn-default">
                    </div>
                </div>

            </div>
        </div>
    </form>
    <!-- Insert Modal End -->


    @endsection
