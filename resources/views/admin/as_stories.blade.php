@extends('layouts.ss_layout')
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
                                        <h5>Farmer Success Stories</h5>
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
                                        <li class="breadcrumb-item active" aria-current="page">Crops Information</li>
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
                                    <h3>Overview</h3>
                                    <div class="card-header-right">
                                        <button data-toggle="modal" data-target="#demoModaladdnew" type="button"
                                            class="btn btn-primary mr-3" data-dismiss="modal">Add New</button>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div class="table-responsive">
                                    @if(isset($as_stories))
                                        @if(count($as_stories)>0)
                                        <table class="table table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Story</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($as_stories as $as_story)
                                                <tr>
                                                    <td>
                                                        <div class="d-inline-block align-middle">
                                                            <div class="d-inline-block">
                                                                <h6>{{$as_story->title}}</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{$as_story->description}}</td>

                                                    <td><a href="/as_story/{{$as_story->id}}/edit"><i
                                                                class="ik ik-edit f-16 mr-15 text-green"></i></a>
                                                        {!!Form::open(['action' => ['AsStoriesController@destroy', $as_story->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                                            {{Form::hidden('_method','DELETE')}}
                                                            <button type="submit" class="btn btn-sm"><i class="ik ik-trash-2 f-16 text-red"></i></button>
                                                        {!!Form::close()!!}
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Crop Model -->
            <div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="demoModalLabel">Crop Detail</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form class="forms-sample">
                                <div class="form-group">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Story
                                        Title</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="exampleInputSeedName2"
                                            placeholder="Title">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Story
                                    Description</label>
                                    <div class="col-sm-12">
                                    <textarea name="description" class="form-control" rows="10"></textarea>
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
                            <h5 class="modal-title" id="demoModalLabel">Add New Story</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ action('AsStoriesController@store') }}" method="post" class="forms-sample">
                                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                <div class="form-group">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Story
                                        Title</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="title" class="form-control" id="exampleInputSeedName2"
                                            placeholder="Title">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Story
                                        Description</label>
                                    <div class="col-sm-12">
                                    <textarea name="description" class="form-control" rows="10"></textarea>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary mr-2">Update</button>
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
