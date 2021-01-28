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
                                    <h3>Trainings Overview</h3>
                                    <div class="card-header-right">
                                        <button data-toggle="modal" data-target="#demoModaladdnew" type="button"
                                            class="btn btn-primary mr-3" data-dismiss="modal">Add New</button>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div class="table-responsive">
                                    @if(isset($trainings))
                                        @if(count($trainings)>0)
                                        <table class="table table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Training</th>
                                                   
                                                    <th>Cost</th>
                                                    <th>Date</th>
                                                    <th>Tags</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($trainings as $training)
                                                <tr>
                                                    <td>
                                                        <div class="d-inline-block align-middle">
                                                            <img src="/storage/tranings/{{$training->image}}" alt="user image"
                                                                class="rounded img-40 align-top mr-15">
                                                            <div class="d-inline-block">
                                                                <h6>{{$training->name}}</h6>
                                                                <p class="text-muted mb-0">{{$training->description}}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                   
                                                    <td>{{$training->cost}}</td>
                                                    <td>{{$training->date}}</td>
                                                    <td>
                                                        <?php
                                                            $comps = explode(',', $training->tags);
                                                            foreach ($comps as $comp) {
                                                                ?>
                                                                <label class="badge badge-primary">{{$comp}}</label>
                                                                <?php
                                                            }
                                                        ?>
                                                    </td>
                                                    <td><a href="/training/{{$training->id}}/edit"><i
                                                                class="ik ik-edit f-16 mr-15 text-green"></i></a>
                                                        <!-- <a href="#!"><i class="ik ik-trash-2 f-16 text-red"></i></a> -->
                                                        {!!Form::open(['action' => ['TrainingController@destroy', $training->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
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
        </div>

        <div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="demoModalLabel">Training Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form class="forms-sample">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Training Image</label>
                                <div class="col-sm-9">
                                    <div class="form-control d-flex align-items-center">
                                        <img src="../img/traning.png" alt="user image"
                                            class="rounded img-40 align-top mr-15 my-2">
                                        <input type="file" name="img" accept="image/*">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Training Name</label>
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
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label"> Date</label>
                                <div class="col-sm-9">
                                    <input type="time" class="form-control" placeholder="Expiry Date">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Cost(Rs)</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" placeholder="Prise(Rs)">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Tags</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="farmer, quality">
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary mr-2">Update</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="demoModaladdnew" tabindex="-1" role="dialog" aria-labelledby="demoModaladdnewLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="demoModalLabel">Add New Traning Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ action('TrainingController@store') }}" method="post" class="forms-sample" enctype="multipart/form-data">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>  
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Training Image</label>
                                <div class="col-sm-9">
                                    <div class="form-control d-flex align-items-center">
                                        <input class="my-2" type="file" name="image" accept="image/*">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Training Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="tname" class="form-control" id="exampleInputSeedName2"
                                        placeholder="Training Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">
                                    <input type="text" name="description" class="form-control" id="exampleInputDescription2"
                                        placeholder="Description">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label"> Date</label>
                                <div class="col-sm-9">
                                    <input type="date" name="edate" class="form-control" placeholder="Expiry Date">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Cost(Rs)</label>
                                <div class="col-sm-9">
                                    <input type="number" name="cost" class="form-control" placeholder="Prise(Rs)">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Tags</label>
                                <div class="col-sm-9">
                                    <input type="text" name="tags" class="form-control" placeholder="farmer, quality">
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
