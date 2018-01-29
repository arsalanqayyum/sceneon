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
                    <a href="#">Categories</a>
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
        <div class="container">
            @if(session()->has('msg'))
                <div class="alert alert-success alert-dismissable" style="margin-top:45px">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <strong>{{session()->get('msg')}}</strong>
                </div>
            @endif
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" style="margin-top: 15px; margin-bottom: 15px; float: right">Add New</button>
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Categories</th>
                    <th>Action</th>
                </tr>
                @foreach($getcats as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->category}}</td>
                    <td>
                    <a href="#" data-toggle="modal" data-target="#editModal_{{$post->id}}" class="btn btn-success"><i class="fa fa-edit"></i> </a>
                    <a href="#" data-toggle="modal" data-target="#deleteModal_{{$post->id}}" class="btn btn-danger"><i class="fa fa-close"></i> </a>
                    </td>
                </tr>

                    <!--Edit Modal -->
                    <form method="POST" action="{{route('editcategory',$post->id)}}">
                        {{csrf_field()}}
                        <div id="editModal_{{$post->id}}" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Edit Category</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Edit this Category</p>

                                        <input type="text" name="cat" placeholder="New Category" value="{{$post->category}}">
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" value="submit" class="btn btn-success">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                    <!-- Edit Modal End -->

                    <!--Delete Modal -->
                    <form method="GET" action="{{route('deletecategory',$post->id)}}">
                        {{csrf_field()}}
                        <div id="deleteModal_{{$post->id}}" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Delete Category</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete this category?</p>

                                        <input type="text" name="cat" placeholder="New Category" value="{{$post->category}}">
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" value="Yes" class="btn btn-success">
                                        <input type="button" value="No" class=" btn btn-danger" data-dismiss="modal">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                    <!-- Delete Modal End -->


                    @endforeach
            </table>
        </div>

    </div>
</div>

<!-- Modal -->
<form method="POST" action="{{route('insertcategory')}}" enctype="multipart/form-data">
    {{csrf_field()}}
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">New Category</h4>
                </div>
                <div class="modal-body">
                    <p>Add New Category</p>

                    <input type="text" name="cat" placeholder="New Category">
                </div>
                <div class="modal-footer">
                    <input type="submit" value="submit" class="btn btn-success">
                </div>
            </div>

        </div>
    </div>
</form>
<!-- Modal End -->


@endsection