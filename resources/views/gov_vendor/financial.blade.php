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
                                    <i class="ik ik-book bg-blue"></i>
                                    <div class="d-inline">
                                        <h5>Financial Information</h5>
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
                                            <a href="#">Financial Information</a>
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    @include('inc.messages')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card table-card">
                                <div class="card-header">
                                    <h3>Loans Information</h3>
                                    <div class="card-header-right">
                                        <button data-toggle="modal" data-target="#demoModaladdnew" type="button"
                                            class="btn btn-primary mr-3" data-dismiss="modal">Add New</button>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div class="table-responsive">
                                    @if(isset($loans))
                                        @if(count($loans)>0)
                                            <table class="table table-hover mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>About Loan</th>
                                                        <th>Type</th>
                                                        <th>Last Date</th>
                                                        <th>Dowmload</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($loans as $loan)
                                                        <tr>
                                                            <td>
                                                                <div class="d-inline-block align-middle">
                                                                    <div class="d-inline-block">
                                                                        <h6>{{$loan->about}}</h6>
                                                                        <p class="text-muted mb-0">{{$loan->description}}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>{{$loan->type}}</td>
                                                            <td>{{$loan->last_date}}/td>
                                                            <td>
                                                                <a href="/storage/loan_files/{{$loan->file}}" target="_blank" class="btn btn-outline-primary">Download/View</a> 
                                                            </td>
                                                            <td><a href="/loan/{{$loan->id}}/edit"><i
                                                                        class="ik ik-edit f-16 mr-15 text-green"></i></a>
                                                                <!-- <a href="#!"><i class="ik ik-trash-2 f-16 text-red"></i></a> -->
                                                                {!!Form::open(['action' => ['LoanController@destroy', $loan->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
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

                        <div class="col-md-6">
                            <div class="card table-card">
                                <div class="card-header">
                                    <h3>Tenders Information</h3>
                                    <div class="card-header-right">
                                        <button data-toggle="modal" data-target="#demoModaladdnewTender" type="button"
                                            class="btn btn-primary mr-3" data-dismiss="modal">Add New</button>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div class="table-responsive">
                                    @if(isset($tenders))
                                        @if(count($tenders)>0)
                                            <table class="table table-hover mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>About Tender</th>
                                                        <th>Type</th>
                                                        <th>Last Date</th>
                                                        <th>Dowmload</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($tenders as $tender)
                                                        <tr>
                                                            <td>
                                                                <div class="d-inline-block align-middle">
                                                                    <div class="d-inline-block">
                                                                        <h6>{{$tender->about}}</h6>
                                                                        <p class="text-muted mb-0">{{$tender->description}}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>{{$tender->type}}</td>
                                                            <td>{{$tender->last_date}}</td>
                                                            <td>
                                                                <a href="/storage/loan_files/{{$tender->file}}" target="_blank" class="btn btn-outline-primary">Download/View</a> 
                                                            </td>
                                                            <td><a href="/tender/{{$tender->id}}/edit"><i
                                                                        class="ik ik-edit f-16 mr-15 text-green"></i></a>
                                                                <!-- <a href="#!"><i class="ik ik-trash-2 f-16 text-red"></i></a> -->
                                                                {!!Form::open(['action' => ['TenderController@destroy', $tender->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
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

        <!-- Loan Models -->

        <div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="demoModalLabel">Loan Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form class="forms-sample">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Loan Files</label>
                                <div class="col-sm-9">
                                    <div class="form-control d-flex align-items-center">
                                        <input type="file" name="img" accept="image/*">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Loan Name</label>
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
                        <h5 class="modal-title" id="demoModalLabel">Add New Loan Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ action('LoanController@store') }}" method="post" class="forms-sample" enctype="multipart/form-data">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>  

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Loan File</label>
                                <div class="col-sm-9">
                                    <div class="form-control d-flex align-items-center">
                                        <input type="file" name="loan_file" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Loan Title</label>
                                <div class="col-sm-9">
                                    <input type="text" name="title" class="form-control" id="exampleInputSeedName2"
                                        placeholder="Loan Title" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Loan Type</label>
                                <div class="col-sm-9">
                                    <input type="text" name="type" class="form-control" id="exampleInputSeedName2"
                                        placeholder="e.g. Technical" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">
                                    <input type="text" name="description" class="form-control" id="exampleInputDescription2"
                                        placeholder="Description" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label"> Date</label>
                                <div class="col-sm-9">
                                    <input type="date" name="date" class="form-control" placeholder="Deadline Date" required>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Add</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tenders Models -->
        <div class="modal fade" id="demoModalTender" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="demoModalLabel">Tender Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form class="forms-sample">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tender Files</label>
                                <div class="col-sm-9">
                                    <div class="form-control d-flex align-items-center">
                                        <input type="file" name="img" accept="image/*">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Tender Name</label>
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

                            <button type="submit" class="btn btn-primary mr-2">Update</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="demoModaladdnewTender" tabindex="-1" role="dialog"
            aria-labelledby="demoModaladdnewLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="demoModalLabel">Add New Tender Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                    <form action="{{ action('TenderController@store') }}" method="post" class="forms-sample" enctype="multipart/form-data">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>  

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tender File</label>
                                <div class="col-sm-9">
                                    <div class="form-control d-flex align-items-center">
                                        <input type="file" name="loan_file" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Tender Title</label>
                                <div class="col-sm-9">
                                    <input type="text" name="title" class="form-control" id="exampleInputSeedName2"
                                        placeholder="Tender Title" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Tender Type</label>
                                <div class="col-sm-9">
                                    <input type="text" name="type" class="form-control" id="exampleInputSeedName2"
                                        placeholder="e.g. Technical" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">
                                    <input type="text" name="description" class="form-control" id="exampleInputDescription2"
                                        placeholder="Description" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label"> Date</label>
                                <div class="col-sm-9">
                                    <input type="date" name="date" class="form-control" placeholder="Deadline Date" required>
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
