@extends('layouts.admin')
@section('content')
<div class="wrapper">
<header class="header-top" header-theme="light">
            <div class="container-fluid">
                <div class="d-flex justify-content-between">
                    <div class="top-menu d-flex align-items-center">
                        <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                        <button type="button" id="navbar-fullscreen" class="nav-link"><i
                                class="ik ik-maximize"></i></button>
                    </div>
                    <div class="top-menu d-flex align-items-center">
                        <div class="dropdown">
                            <a class="dropdown-toggle d-flex align-items-center" href="#" id="userDropdown"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- <img class="avatar" src="img/user.jpg" alt=""> -->
                                <span class="ml-1">SAS Admin  <i class="fa fa-caret-down" aria-hidden="true"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                <!-- <a class="dropdown-item" href="pages/admin-profile.html"><i
                                        class="ik ik-user dropdown-icon"></i>
                                    Profile</a> -->
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <i
                                        class="ik ik-power dropdown-icon"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </header>

        <div class="page-wrap">
            <div class="app-sidebar colored">
                <div class="sidebar-header">
                    <a class="header-brand" href="index (Admin).html">
                        <span class="text">Smart Agriculture</span>
                    </a>
                    <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
                </div>

                @include('inc.admin_sidebar')
            </div>


            <div class="main-content">
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="row align-items-end">
                            <div class="col-lg-8">
                                <div class="page-header-title">
                                    <i class="ik ik-layers bg-blue"></i>
                                    <div class="d-inline">
                                        <h5>Farmer-friendly Materials</h5>
                                        <span>Smart Agriculture System</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <nav class="breadcrumb-container" aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="../index.html"><i class="ik ik-home"></i></a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="#">Knowledge</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">Materials</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    @include('inc.messages')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Booklets Detail</h3>
                                </div>
                                <div class="card-body">
                                    <div id="data_table_wrapper"
                                        class="dataTables_wrapper dt-bootstrap4 no-footer py-3">
                                        <div class="row mb-5">
                                            <div class="col-sm-12 col-md-6">
                                            </div>
                                            <div class="col-sm-12 col-md-6">

                                                <div id="data_table_filter"
                                                    class="dataTables_filter d-flex justify-content-end pr-2">
                                                    <button data-toggle="modal" data-target="#demoModaladdnew"
                                                        type="button" class="btn btn-primary mr-3"
                                                        data-dismiss="modal">Add New Booklet</button>
                                                    <input type="search" class="form-control form-control-sm"
                                                        placeholder="Search" aria-controls="data_table"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-sm-12">
                                        @if(isset($booklets))
                                        @if(count($booklets)>0)
                                            <table id="data_table" class="table dataTable no-footer" role="grid"
                                                aria-describedby="data_table_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting" tabindex="0" aria-controls="data_table"
                                                            rowspan="1" colspan="1" style="width: 209.45px;"
                                                            aria-label="Name: activate to sort column ascending">
                                                            Name</th>
                                                        <th class="sorting" tabindex="0" aria-controls="data_table"
                                                            rowspan="1" colspan="1" style="width: 322.867px;"
                                                            aria-label="Email: activate to sort column ascending">
                                                            Description</th>
                                                        <th class="sorting" tabindex="0" aria-controls="data_table"
                                                            rowspan="1" colspan="1" style="width: 322.867px;"
                                                            aria-label="Email: activate to sort column ascending">
                                                            Format</th>
                                                        <th class="nosort sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 175.317px;" aria-label="&amp;nbsp;">&nbsp;
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($booklets as $booklet)
                                                    <tr role="row" class="odd selected">
                                                        <td>{{$booklet->name}}</td>
                                                        <td>{{$booklet->description}}
                                                        </td>
                                                        <td>
                                                            <div class="table-actions">
                                                                <a href="/storage/booklets/{{$booklet->file}}" target="_blank"><i class="ik ik-eye"></i></a>
                                                                <a href="/booklet/{{$booklet->id}}/edit"><i class="ik ik-edit-2"></i></a>
                                                                {!!Form::open(['action' => ['BookletController@destroy', $booklet->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                                                    {{Form::hidden('_method','DELETE')}}
                                                                    <button type="submit" class="btn btn-sm"><i class="ik ik-trash-2 f-16 text-red"></i></button>
                                                                {!!Form::close()!!}
                                                            </div>
                                                        </td>
                                                        
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            @endif
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-5">
                                            <div class="dataTables_info" id="data_table_info" role="status"
                                                aria-live="polite">Showing 1 to 5 of 5 entries</div>
                                        </div>
                                        <div class="col-sm-12 col-md-7">
                                            <div class="dataTables_paginate paging_simple_numbers  d-flex justify-content-end pr-2"
                                                id="data_table_paginate">
                                                <ul class="pagination">
                                                    <li class="paginate_button page-item previous disabled"
                                                        id="data_table_previous"><a href="#" aria-controls="data_table"
                                                            data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                                                    </li>
                                                    <li class="paginate_button page-item active"><a href="#"
                                                            aria-controls="data_table" data-dt-idx="1" tabindex="0"
                                                            class="page-link">1</a></li>
                                                    <li class="paginate_button page-item next disabled"
                                                        id="data_table_next"><a href="#" aria-controls="data_table"
                                                            data-dt-idx="2" tabindex="0" class="page-link">Next</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Motivational Videos Detail</h3>
                                </div>
                                <div class="card-body">
                                    <div id="data_table_wrapper"
                                        class="dataTables_wrapper dt-bootstrap4 no-footer py-3">
                                        <div class="row mb-5">
                                            <div class="col-sm-12 col-md-6">
                                            </div>
                                            <div class="col-sm-12 col-md-6">

                                                <div id="data_table_filter"
                                                    class="dataTables_filter d-flex justify-content-end pr-2">
                                                    <button data-toggle="modal" data-target="#demoModaladdnewVideo"
                                                        type="button" class="btn btn-primary mr-3"
                                                        data-dismiss="modal">Add New Video</button>
                                                    <input type="search" class="form-control form-control-sm"
                                                        placeholder="Search" aria-controls="data_table"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-sm-12">
                                        @if(isset($mvideos))
                                        @if(count($mvideos)>0)
                                            <table id="data_table" class="table dataTable no-footer" role="grid"
                                                aria-describedby="data_table_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting" tabindex="0" aria-controls="data_table"
                                                            rowspan="1" colspan="1" style="width: 209.45px;"
                                                            aria-label="Name: activate to sort column ascending">
                                                            Name</th>
                                                        <th class="sorting" tabindex="0" aria-controls="data_table"
                                                            rowspan="1" colspan="1" style="width: 322.867px;"
                                                            aria-label="Email: activate to sort column ascending">
                                                            Description</th>
                                                            <th class="sorting" tabindex="0" aria-controls="data_table"
                                                            rowspan="1" colspan="1" style="width: 322.867px;"
                                                            aria-label="Youtube Link">
                                                            Link</th>
                                                        
                                                        <!-- <th class="sorting" tabindex="0" aria-controls="data_table"
                                                            rowspan="1" colspan="1" style="width: 322.867px;"
                                                            aria-label="Email: activate to sort column ascending">
                                                            Thumbnail</th> -->
                                                        <th class="nosort sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 175.317px;" aria-label="&amp;nbsp;">&nbsp;
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($mvideos as $mvideo)
                                                        <tr role="row" class="odd selected">
                                                            <td>{{$mvideo->name}}</td>
                                                            <td>{{$mvideo->description}}
                                                            </td>
                                                            <!-- <td>
                                                                <img src="../img/portfolio-10.jpg" alt="user image"
                                                                    class="rounded img-100 align-top">
                                                            </td> -->
                                                            <td>
                                                                <a href="{{$mvideo->url}}" target="_blank">Link</a>
                                                            </td>
                                                            <td>
                                                                <div class="table-actions">
                                                                    <a href="/storage/mvideos/{{$mvideo->file}}" target="_blank"><i class="ik ik-eye"></i></a>
                                                                    <a href="/mvideos/{{$mvideo->id}}/edit"><i class="ik ik-edit-2"></i></a>
                                                                    {!!Form::open(['action' => ['MvideosController@destroy', $mvideo->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                                                    {{Form::hidden('_method','DELETE')}}
                                                                    <button type="submit" class="btn btn-sm"><i class="ik ik-trash-2 f-16 text-red"></i></button>
                                                                {!!Form::close()!!}                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            @endif
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-5">
                                            <div class="dataTables_info" id="data_table_info" role="status"
                                                aria-live="polite">Showing 1 to 5 of 5 entries</div>
                                        </div>
                                        <div class="col-sm-12 col-md-7">
                                            <div class="dataTables_paginate paging_simple_numbers  d-flex justify-content-end pr-2"
                                                id="data_table_paginate">
                                                <ul class="pagination">
                                                    <li class="paginate_button page-item previous disabled"
                                                        id="data_table_previous"><a href="#" aria-controls="data_table"
                                                            data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                                                    </li>
                                                    <li class="paginate_button page-item active"><a href="#"
                                                            aria-controls="data_table" data-dt-idx="1" tabindex="0"
                                                            class="page-link">1</a></li>
                                                    <li class="paginate_button page-item next disabled"
                                                        id="data_table_next"><a href="#" aria-controls="data_table"
                                                            data-dt-idx="2" tabindex="0" class="page-link">Next</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Booklets Model -->
            <div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="demoModalLabel">Booklet Detail</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form class="forms-sample">
                                <div class="form-group row">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Booklet
                                        Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="exampleInputSeedName2"
                                            placeholder="Seed Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Description</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="exampleInputDescription2"
                                            placeholder="Description">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Files</label>
                                    <div class="col-sm-9">
                                        <div class="form-control d-flex align-items-center">
                                            <input type="file" name="img" accept="image/*">
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary mr-2">Update</button>
                                <button class="btn btn-light">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="demoModaladdnew" tabindex="-1" role="dialog"
                aria-labelledby="demoModaladdnewLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="demoModalLabel">Booklet Detail</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ action('BookletController@store') }}" method="post" class="forms-sample" enctype="multipart/form-data">
                                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                <div class="form-group row">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Booklet
                                        Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="name" id="exampleInputSeedName2"
                                            placeholder="Seed Name" required="required">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Description</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="description" class="form-control" id="exampleInputDescription2"
                                            placeholder="Description" required="required">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Files</label>
                                    <div class="col-sm-9">
                                        <div class="form-control d-flex align-items-center">
                                            <!-- accept="image/*" -->
                                            <input type="file" name="bookletfile" required="required">
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary mr-2">Add</button>
                                <button class="btn btn-light">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Video Model -->
            <div class="modal fade" id="demoModalVideo" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="demoModalLabel">Video Detail</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form class="forms-sample">
                                <div class="form-group row">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Video
                                        Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="exampleInputSeedName2"
                                            placeholder="Seed Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Description</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="exampleInputDescription2"
                                            placeholder="Description">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">URL</label>
                                    <div class="col-sm-9">
                                        <input type="url" class="form-control" id="exampleInputDescription2"
                                            placeholder="Youtube Link">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Files</label>
                                    <div class="col-sm-9">
                                        <div class="form-control d-flex align-items-center">
                                            <input type="file" name="img" accept="image/*">
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary mr-2">Update</button>
                                <button class="btn btn-light">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="demoModaladdnewVideo" tabindex="-1" role="dialog"
                aria-labelledby="demoModaladdnewLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="demoModalLabel">Add New Video</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ action('MvideosController@store') }}" method="post" class="forms-sample" enctype="multipart/form-data">
                                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                <div class="form-group row">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Video
                                        Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="mvname" class="form-control" id="exampleInputSeedName2"
                                            placeholder="Video Name" required="required">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Description</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="mvdescription" class="form-control" id="exampleInputDescription2"
                                            placeholder="Description" required="required">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">URL</label>
                                    <div class="col-sm-9">
                                        <input type="url" class="form-control" name="mvurl" id="exampleInputDescription2"
                                            placeholder="Youtube Link">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Upload Video</label>
                                    <div class="col-sm-9">
                                        <div class="form-control d-flex align-items-center">
                                            <input type="file" name="mvfile">
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary mr-2">Add</button>
                                <button class="btn btn-light">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <footer class="footer">
                <div class="w-100 clearfix">
                    <span class="text-center text-sm-left d-md-inline-block">Copyright © 2020. All Rights
                        Reserved.</span>
                    <span class="float-none float-sm-right mt-1 mt-sm-0 text-center">Crafted with <i
                            class="fa fa-heart text-danger"></i> by <a href="#" class="text-dark" target="_blank">Smart
                            Agriculture System</a></span>
                </div>
            </footer>

        </div>
    </div>
@endsection
