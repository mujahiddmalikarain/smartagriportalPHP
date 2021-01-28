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
                                        <h5>Organization Detail</h5>
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
                                        <li class="breadcrumb-item active" aria-current="page">Organization</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    @include('inc.messages')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center">
                                        @if(isset($gov))
                                            <img src="/storage/po_icons/{{$gov->icon}}" class="rounded" width="150" />
                                        @endif
                                        <h4 class="card-title mt-10">{{Auth::user()->name}}</h4>
                                        <p class="card-subtitle">Private Organization</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-profile-tab" data-toggle="pill"
                                            href="#last-month" role="tab" aria-controls="pills-profile"
                                            aria-selected="false">Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-setting-tab" data-toggle="pill"
                                            href="#previous-month" role="tab" aria-controls="pills-setting"
                                            aria-selected="false">Setting</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="last-month" role="tabpanel"
                                        aria-labelledby="pills-profile-tab">
                                        @if(isset($gov))
                                            <div class="card-body">
                                            
                                                    <div class="row">
                                                        <div class="col-md-3 col-6"> <strong>Private Organization</strong>
                                                            <br>
                                                            <p class="text-muted">{{Auth::user()->name}}</p>
                                                        </div>
                                                        <div class="col-md-3 col-6"> <strong>Mobile</strong>
                                                            <br>
                                                            <p class="text-muted">{{$gov->ph}}</p>
                                                        </div>
                                                        <div class="col-md-3 col-6"> <strong>Email</strong>
                                                            <br>
                                                            <p class="text-muted">{{Auth::user()->email}}</p>
                                                        </div>
                                                        <div class="col-md-3 col-6"> <strong>Location</strong>
                                                            <br>
                                                            <p class="text-muted">{{$gov->country}}</p>
                                                        </div>
                                                    </div>
                                            
                                                <hr>
                                                <p class="mt-30">{{$gov->message}}</p>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="tab-pane fade" id="previous-month" role="tabpanel"
                                        aria-labelledby="pills-setting-tab">
                                        <div class="card-body">
                                        <?php $var = 1; ?>
                                        <!-- {!! Form::open(['action' => 'GovorgController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data','class'=>'form-horizontal']) !!} -->
                                        <form action="{{ action('PrivateVendorController@store') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>  
                                                @if(isset($gov))
                                                    <div class="form-group">
                                                        <label for="example-name">Full Name (Organization)</label>
                                                        <input type="text" placeholder="Fertilizer Company Limited"
                                                            class="form-control" name="name" value="{{Auth::user()->name}}" id="example-name" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="example-email">Email</label>
                                                        <input type="email" disabled 
                                                            class="form-control" name="email" value="{{Auth::user()->email}}" id="example-email">
                                                    </div>
                                                    <!-- <div class="form-group">
                                                        <label for="example-password">Password</label>
                                                        <input type="password" value="password" class="form-control"
                                                            name="example-password" id="example-password">
                                                    </div> -->
                                                    <div class="form-group">
                                                        <label for="example-phone">Phone No</label>
                                                        <input type="number" placeholder="1234567890" id="example-phone"
                                                            name="ph" value="{{$gov->ph}}" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="example-message">Message</label>
                                                        <textarea name="msg" rows="5" class="form-control">{{$gov->message}}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="example-country">Country</label>
                                                        <input type="text" placeholder="e.g Pakistan" id="example-phone"
                                                            name="country" value="{{$gov->country}}" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="example-password">Organization Icon</label>
                                                        <input type="file" name="oicon" class="form-control" id="example-password">
                                                    </div>
                                                @else
                                                    <div class="form-group">
                                                        <label for="example-name">Full Name (Organization)</label>
                                                        <input type="text" placeholder="Fertilizer Company Limited"
                                                            class="form-control" name="name" id="example-name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="example-email">Email</label>
                                                        <input type="email" placeholder="johnathan@admin.com"
                                                            class="form-control" name="email" id="example-email">
                                                    </div>
                                                    <!-- <div class="form-group">
                                                        <label for="example-password">Password</label>
                                                        <input type="password" value="password" class="form-control"
                                                            name="example-password" id="example-password">
                                                    </div> -->
                                                    <div class="form-group">
                                                        <label for="example-phone">Phone No</label>
                                                        <input type="text" placeholder="123 456 7890" id="example-phone"
                                                            name="ph" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="example-message">Message</label>
                                                        <textarea name="msg" rows="5" class="form-control"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="example-country">Country</label>
                                                        <input type="text" placeholder="e.g Pakistan" id="example-phone"
                                                            name="country" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="example-password">Organization Icon</label>
                                                        <input type="file" name="oicon" class="form-control" id="example-password">
                                                    </div>
                                                @endif
                                               
                                                                                                                                     
                                                <button class="btn btn-success" type="submit">Update Profile</button>
                                               </form>
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
