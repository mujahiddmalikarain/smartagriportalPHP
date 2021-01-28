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
                                        <h5>Farmer-friendly Materials | Update</h5>
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
                    <div class="card">
                    <div class="card-body">
                    {!! Form::open(['action' => ['BookletController@update', $booklet->id ], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                <div class="form-group row">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Booklet
                                        Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="name" value="{{$booklet->name}}" id="exampleInputSeedName2"
                                            placeholder="Booklet Name" required="required">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Description</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="description" value="{{$booklet->description}}" class="form-control" id="exampleInputDescription2"
                                            placeholder="Description" required="required">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Bootlet File</label>
                                    <div class="col-sm-9">
                                        <div class="form-control d-flex align-items-center">
                                            <!-- accept="image/*" -->
                                            <input type="file" name="bookletfile">
                                        </div>
                                    </div>
                                </div>
                                {{Form::hidden('_method','PUT')}}
                                {{Form::submit('Update',['class' => 'btn btn-success mr-2'])}}
                            {!! Form::close() !!}
                    </div>
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
