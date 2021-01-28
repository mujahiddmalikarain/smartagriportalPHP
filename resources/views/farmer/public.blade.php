@extends('layouts.farmer')
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
                    <a class="header-brand" href="index.html">
                        <span class="text">Smart Agriculture</span>
                    </a>
                    <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
                </div>

                <div class="sidebar-content">
                    <div class="nav-container">
                        <nav id="main-menu-navigation" class="navigation-main">
                            <div class="nav-item active">
                                <a href="/home"><i class="ik ik-users"></i><span>Community</span></a>
                            </div>

                            <div class="nav-item has-sub">
                                <a href="javascript:void(0)"><i class="ik ik-menu"></i><span>Organizations</span></a>
                                <div class="submenu-content">
                                    <a href="/org/private" class="menu-item">Private</a>
                                    <a href="/org/public" class="menu-item">Public</a>
                                </div>
                            </div>
                            <div class="nav-item has-sub">
                                <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Knowledge</span></a>
                                <div class="submenu-content">
                                    <a href="/farmer/booklets" class="menu-item">Booklets</a>
                                    <a href="/farmer/mvideos" class="menu-item">Motivational Videos</a>
                                    <a href="/farmer/sstories" class="menu-item">Success Stories</a>
                                </div>
                            </div>
                            <!-- <div class="nav-item">
                                <a href="pages/farmer-locate.html"><i class="ik ik-map"></i><span>Local Service
                                        Center</span></a>
                            </div> -->
                            <div class="nav-item has-sub">
                                <a href="javascript:void(0)"><i class="ik ik-sun"></i><span>Environment</span></a>
                                <div class="submenu-content">
                                    <a href="/farmer/soilreport" class="menu-item">View Soil Health</a>
                                    <a href="pages/farmer-weather.html" class="menu-item">Weather Report</a>
                                </div>
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
                                    <i class="ik ik-inbox bg-blue"></i>
                                    <div class="d-inline">
                                        <h5>Public Organizations, Loans and Tenders</h5>
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
                                            <a href="#">Organizations</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">Public</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Public Organizations List</h3>
                                </div>
                                <div class="card-body">
                                @if(isset($orgs))
                                    @if(count($orgs)>0)
                                    <table id="data_table" class="table">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th class="nosort">Image (Logo)</th>
                                                <th>Name</th>
                                                <th>Detail</th>
                                                <th></th>
                                                <!-- <th></th>
                                                <th class="nosort">&nbsp;</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($orgs as $org)
                                                <tr>
                                                    <td>{{$org->id}}</td>
                                                    <td><img src="/storage/go_icons/{{$org->icon}}" class="table-user-thumb" alt=""></td>
                                                    <td>{{$org->name}}</td>
                                                    <td>{{$org->message}}
                                                    </td>
                                                    <!-- <td>
                                                        <div class="table-actions">
                                                            <a href="#" data-toggle="modal" data-target="#demoModal"><i
                                                                    class="ik ik-eye"></i></a>
                                                        </div>
                                                    </td> -->
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

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card table-card">
                                <div class="card-header">
                                    <h3>Loans Information</h3>
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
                                                        <th></th>
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
                                                            <td>{{$loan->last_date}}</td>
                                                            <td>
                                                                <a href="/storage/loan_files/{{$loan->file}}" target="_blank" class="btn btn-outline-primary">Download/View</a> 
                                                            </td>
                                                            <!-- <td><a data-toggle="modal" data-target="#demoModal" href="#!"><i
                                                                        class="ik ik-edit f-16 mr-15 text-green"></i></a><a
                                                                    href="#!"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                                            </td> -->
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
                                                        <th></th>
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
                                                            <!-- <td><a data-toggle="modal" data-target="#demoModal" href="#!"><i
                                                                        class="ik ik-edit f-16 mr-15 text-green"></i></a><a
                                                                    href="#!"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                                            </td> -->
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

                        <div class="col-md-12">
                            <div class="card table-card">
                                <div class="card-header">
                                    <h3>Trainings Overview</h3>
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
                                                    <th></th>
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
                                                    <!-- <td><a data-toggle="modal" data-target="#demoModal" href="#!"><i
                                                                class="ik ik-edit f-16 mr-15 text-green"></i></a><a
                                                            href="#!"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                                    </td> -->
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



            <div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="demoModalLabel">Fatima Fertilizer Company Limited</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <nav>
                                <div class="nav nav-pills nav-fill" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-seeds-tab" data-toggle="tab"
                                        href="#nav-seeds" role="tab" aria-controls="nav-seeds"
                                        aria-selected="true">Seeds</a>
                                    <a class="nav-item nav-link" id="nav-fertilizers-tab" data-toggle="tab"
                                        href="#nav-fertilizers" role="tab" aria-controls="nav-fertilizers"
                                        aria-selected="false">Fertilizers</a>
                                    <a class="nav-item nav-link" id="nav-pesticides-tab" data-toggle="tab"
                                        href="#nav-pesticides" role="tab" aria-controls="nav-pesticides"
                                        aria-selected="false">Pesticides</a>
                                    <a class="nav-item nav-link" id="nav-machinery-tab" data-toggle="tab"
                                        href="#nav-machinery" role="tab" aria-controls="nav-machinery"
                                        aria-selected="false">Machinery</a>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-seeds" role="tabpanel"
                                    aria-labelledby="nav-seeds-tab">

                                    <div class="table-responsive mt-4">
                                        <table class="table table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Fertilizers Name</th>
                                                    <th>Fertilizers Description</th>
                                                    <th>Status</th>
                                                    <th>Expiry Date</th>
                                                    <th>Prise(Rs)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Fertilizers 1</td>
                                                    <td>lorem ipsum dolor sit amet, consectetur adipisicing elit</td>
                                                    <td><label class="badge badge-success">Good</label></td>
                                                    <td>04/08/2019</td>
                                                    <td>
                                                        1500
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Fertilizers 2</td>
                                                    <td>lorem ipsum dolor sit amet, consectetur adipisicing elit</td>

                                                    <td><label class="badge badge-success">Good</label></td>
                                                    <td>04/08/2019</td>
                                                    <td>
                                                        500
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Fertilizers 3</td>
                                                    <td>lorem ipsum dolor sit amet, consectetur adipisicing elit</td>

                                                    <td><label class="badge badge-success">Good</label></td>
                                                    <td>04/08/2019</td>
                                                    <td>
                                                        500
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Fertilizers 4</td>
                                                    <td>lorem ipsum dolor sit amet, consectetur adipisicing elit</td>

                                                    <td><label class="badge badge-danger">Bad</label></td>
                                                    <td>04/08/2019</td>
                                                    <td>
                                                        500
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Fertilizers 5</td>
                                                    <td>lorem ipsum dolor sit amet, consectetur adipisicing elit</td>

                                                    <td><label class="badge badge-success">Good</label></td>
                                                    <td>04/08/2019</td>
                                                    <td>
                                                        500
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="nav-fertilizers" role="tabpanel"
                                    aria-labelledby="nav-fertilizers-tab">...fertilizers</div>
                                <div class="tab-pane fade" id="nav-pesticides" role="tabpanel"
                                    aria-labelledby="nav-pesticides-tab">...pesticides</div>
                                <div class="tab-pane fade" id="nav-machinery" role="tabpanel"
                                    aria-labelledby="nav-machinery-tab">...machinery</div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
