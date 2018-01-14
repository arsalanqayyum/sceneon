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
                        <a href="#">Add New Slider</a>
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
            @if(session()->has('message'))
                <div class="alert alert-success alert-dismissable" style="margin-top:45px">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <strong>{{session()->get('message')}}</strong>
                </div>
            @endif
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" style="margin-top: 15px; margin-bottom: 15px; float: right">Add New</button>
            @foreach($getslider as $slider)
            <table class="table table-bordered">
            <tr>
                <th>IDs</th>
                <th>Image</th>
                <th>Index</th>
                <th>Action</th>
            </tr>

            <tr>
                <td>
                    {{$slider->id}}
                </td>
                <td>
                    <img src="{{$ghar.'/slider/' .$slider->image}}" class="img-responsive" width="600px">
                </td>
                <td>
                    {{$slider->index}}
                </td>
                <td>
                    <a href="{{route('editslider',$slider->id)}}" data-toggle="modal" data-target="#editModal_{{$slider->id}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                    <a href="#" data-toggle="modal" data-target="#deleteModal_{{$slider->id}}" class="btn btn-danger"><i class="fa fa-close"></i></a>
                </td>
            </tr>

        </table>
            <!-- Edit Modal -->
            <form method="POST" action="{{route('updateslider',$slider->id)}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <div id="editModal_{{$slider->id}}" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Modal Header</h4>
                            </div>
                            <div class="modal-body">
                                <p>Select file to upload</p>

                                <input type="file" name="image">
                                <label>Image</label>
                                <img src="{{$ghar.'/slider/'.$slider->image}}" width="400px">
                                <label>Set Index for Scrolling</label>
                                <input type="text" name="index" placeholder="insert index" value="{{$slider->index}}">
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
                    <form method="GET" action="{{route('deleteslider',$slider->id)}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div id="deleteModal_{{$slider->id}}" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Delete Slider</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete this Slider?</p>
                                        <img src="{{asset('/slider').'/'.$slider->image}}">


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
        <!-- Modal -->
            <form method="POST" action="{{route('insertslider')}}" enctype="multipart/form-data">
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
                                <input type="file" name="image">
                                <input type="text" name="index" placeholder="insert index">
                            </div>
                            <div class="modal-footer">
                                <input type="submit" value="submit" class="btn btn-default">
                            </div>
                        </div>

                    </div>
                </div>
            </form>
            <!-- Modal End -->




        </div>
    </div>
    @endsection