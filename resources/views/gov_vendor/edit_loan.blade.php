@extends('layouts.gov_vendor')
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
                                <!-- <img class="avatar" src="img/0.png" alt=""> -->
                                <span class="ml-1">{{Auth::user()->name}}  <i class="fa fa-caret-down" aria-hidden="true"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                <!-- <a class="dropdown-item" href="/profile"><i
                                        class="ik ik-user dropdown-icon"></i>
                                    Profile</a>
                                <a class="dropdown-item" href="#"><i class="ik ik-settings dropdown-icon"></i>
                                    Settings</a> -->
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="ik ik-power dropdown-icon"></i> {{ __('Logout') }}
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
                    <a class="header-brand" href="/home">
                        <span class="text">Smart Agriculture</span>
                    </a>
                    <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
                </div>

                <div class="sidebar-content">
                    <div class="nav-container">
                        <nav id="main-menu-navigation" class="navigation-main">
                            <div class="nav-item active">
                                <a href="/home"><i
                                        class="ik ik-file-text"></i><span>Organization</span></a>
                            </div>

                            <div class="nav-item">
                                <a href="/training"><i
                                        class="ik ik-shield"></i><span>Trainings</span></a>
                            </div>
                            <div class="nav-item">
                                <a href="/financial"><i class="ik ik-book"></i><span>Financial
                                        Information </span></a>
                            </div>

                        </nav>
                    </div>
                </div>
            </div>
            <div class="main-content">
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="row align-items-end">
                            <div class="col-lg-8">
                                <div class="page-header-title">
                                    <i class="ik ik-shield bg-blue"></i>
                                    <div class="d-inline">
                                        <h5>Tranings</h5>
                                        <span>Smart Agriculture System</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <nav class="breadcrumb-container" aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="/"><i class="ik ik-home"></i></a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="#">Tranings</a>
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    @include('inc.messages')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card table-card">
                                <div class="card-header">
                                    <h3>Loan Update</h3>
                                    <!-- <div class="card-header-right">
                                        <button data-toggle="modal" data-target="#demoModaladdnew" type="button"
                                            class="btn btn-primary mr-3" data-dismiss="modal">Add New</button>
                                    </div> -->
                                </div>
                                <div class="card-block">
                                <div class="col-md-8">
                                {!! Form::open(['action' => ['LoanController@update', $loan->id ], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                <!-- <form action="{{ action('TrainingController@store') }}" method="post" class="forms-sample" enctype="multipart/form-data"> -->
                                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>  

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Loan File</label>
                                            <div class="col-sm-9">
                                                <div class="form-control d-flex align-items-center">
                                                    <input type="file" name="loan_file">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Loan Title</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="title" value="{{$loan->about}}" class="form-control" id="exampleInputSeedName2"
                                                    placeholder="Loan Title" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Loan Type</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="type" value="{{$loan->type}}" class="form-control" id="exampleInputSeedName2"
                                                    placeholder="e.g. Technical" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Description</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="description" value="{{$loan->description}}" class="form-control" id="exampleInputDescription2"
                                                    placeholder="Description" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputMobile" class="col-sm-3 col-form-label"> Date</label>
                                            <div class="col-sm-9">
                                                <input type="date" name="date" value="{{$loan->last_date}}" class="form-control" placeholder="Deadline Date" required>
                                            </div>
                                        </div>

                                    <!-- <button type="submit" class="btn btn-success mr-2">Update</button>
                                   
                                </form> -->
                                    {{Form::hidden('_method','PUT')}}
                                    {{Form::submit('Update',['class' => 'btn btn-success'])}}
                                {!! Form::close() !!}
                                </div>
                                </div>
                            </div>
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
