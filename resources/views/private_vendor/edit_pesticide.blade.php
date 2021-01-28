@extends('layouts.private_vendor')
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
                    <a class="header-brand" href="index.html">
                        <span class="text">Smart Agriculture</span>
                    </a>
                    <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
                </div>

                <div class="sidebar-content">
                    <div class="nav-container">
                        <nav id="main-menu-navigation" class="navigation-main">
                        <div class="nav-item active">
                                <a href="/home"><i class="ik ik-file-text"></i><span>Organization</span></a>
                            </div>

                            <div class="nav-lavel">Resources</div>
                            <div class="nav-item">
                                <a href="/seed"><i class="ik ik-box"></i><span>Seeds</span></a>
                            </div>
                            <div class="nav-item">
                                <a href="/fertilizer"><i
                                        class="ik ik-box"></i><span>Fertilizers</span></a>
                            </div>
                            <div class="nav-item">
                                <a href="/pesticide"><i
                                        class="ik ik-box"></i><span>Pesticides</span></a>
                            </div>
                            <div class="nav-item">
                                <a href="/machinery"><i
                                        class="ik ik-box"></i><span>Machinery</span></a>
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
                                    <i class="ik ik-file-text bg-blue"></i>
                                    <div class="d-inline">
                                        <h5>Resources | Pesticide | Update</h5>
                                        <span>Smart Agriculture System</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <nav class="breadcrumb-container" aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="/home"><i class="ik ik-home"></i></a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="#">Resources</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">Pesticide</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    @include('inc.messages')
                    <div class="row">
                        <div class="card">
                        <div class="card-body col-md-12">
                        {!! Form::open(['action' => ['PesticideController@update', $pesticide->id ], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>  
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Pesticide Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" value="{{$pesticide->name}}" class="form-control" id="exampleInputFertilizerName2"
                                        placeholder="Pesticide Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">
                                    <input type="text" name="description"  value="{{$pesticide->description}}" class="form-control" id="exampleInputDescription2"
                                        placeholder="Description">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Expiry Date</label>
                                <div class="col-sm-9">
                                    <input type="date" name="exp_date" value="{{$pesticide->exp_date}}"  class="form-control" placeholder="Expiry Date">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Prise(Rs)</label>
                                <div class="col-sm-9">
                                    <input type="number" name="price"  value="{{$pesticide->price}}" class="form-control" placeholder="Prise(Rs)">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleSelectGender" class="col-sm-3 col-form-label">Status (Current Status: {{$pesticide->status}})</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="status" id="exampleSelectGender">
                                        <option value="Good">Good</option>
                                        <option value="Normal">Normal</option>
                                        <option value="Bad">Bad</option>
                                    </select>
                                </div>
                            </div>

                            {{Form::hidden('_method','PUT')}}
                            {{Form::submit('Update',['class' => 'btn btn-success mr-2'])}}
                        {!! Form::close() !!}
                        </form>
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
