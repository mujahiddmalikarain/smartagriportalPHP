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
                                  
                                    @if(isset($seeds))
                                            @if(count($seeds)>0)
                                                <table id="data_table" class="table dataTable no-footer" role="grid"
                                                    aria-describedby="data_table_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <!-- <th class="sorting_asc" tabindex="0" aria-controls="data_table"
                                                                rowspan="1" colspan="1" style="width: 50.9px;"
                                                                aria-sort="ascending"
                                                                aria-label="Id: activate to sort column descending">Id
                                                            </th> -->
                                                            <th class="sorting" tabindex="0" aria-controls="data_table"
                                                                rowspan="1" colspan="1" style="width: 209.45px;"
                                                                aria-label="Name: activate to sort column ascending">
                                                                Name</th>
                                                            <th class="sorting" tabindex="0" aria-controls="data_table"
                                                                rowspan="1" colspan="1" style="width: 322.867px;"
                                                                aria-label="Email: activate to sort column ascending">
                                                                Description</th>
                                                            <th class="sorting" tabindex="0" aria-controls="data_table"
                                                                rowspan="1" colspan="1"
                                                                aria-label="Email: activate to sort column ascending">
                                                                Status</th>
                                                            <th class="sorting" tabindex="0" aria-controls="data_table"
                                                                rowspan="1" colspan="1" style="width: 322.867px;"
                                                                aria-label="Email: activate to sort column ascending">
                                                                Expiry Date</th>
                                                            <th class="sorting" tabindex="0" aria-controls="data_table"
                                                                rowspan="1" colspan="1" style="width: 102.867px;"
                                                                aria-label="Email: activate to sort column ascending">
                                                                Prise(Rs)</th>
                                                            <!-- <th class="sorting" tabindex="0" aria-controls="data_table"
                                                                rowspan="1" colspan="1" style="width: 52.867px;"
                                                                aria-label="Email: activate to sort column ascending">
                                                                Rating</th> -->
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($seeds as $resource)
                                                            <tr role="row" class="odd selected">
                                                                <!-- <td class="sorting_1">{{$resource->id}}</td> -->
                                                                <td>{{$resource->name}}</td>
                                                                <td>{{$resource->description}}</td>
                                                                <td>
                                                                    @if($resource->status=="Good")
                                                                        <label class="badge badge-success">Good</label>
                                                                    @elseif($resource->status=="Normal")
                                                                        <label class="badge badge-info">Normal</label>
                                                                    @elseif($resource->status=="Bad")
                                                                        <label class="badge badge-danger">Bad</label>
                                                                    @endif
                                                                </td>
                                                                <td>{{$resource->exp_date}}</td>
                                                                <td>
                                                                {{$resource->price}}
                                                                </td>
                                                                <!-- <td>NaN</td> -->
                                                               
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                @endif
                                            @endif
                                       
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="nav-fertilizers" role="tabpanel"
                                    aria-labelledby="nav-fertilizers-tab">
                                    
                                    @if(isset($fertilizers))
                                            @if(count($fertilizers)>0)
                                            <table id="data_table" class="table dataTable no-footer" role="grid"
                                                aria-describedby="data_table_info">
                                                <thead>
                                                    <tr role="row">
                                                        <!-- <th class="sorting_asc" tabindex="0" aria-controls="data_table"
                                                            rowspan="1" colspan="1" style="width: 50.9px;"
                                                            aria-sort="ascending"
                                                            aria-label="Id: activate to sort column descending">Id
                                                        </th> -->
                                                        <th class="sorting" tabindex="0" aria-controls="data_table"
                                                            rowspan="1" colspan="1" style="width: 209.45px;"
                                                            aria-label="Name: activate to sort column ascending">
                                                            Name</th>
                                                        <th class="sorting" tabindex="0" aria-controls="data_table"
                                                            rowspan="1" colspan="1" style="width: 322.867px;"
                                                            aria-label="Email: activate to sort column ascending">
                                                            Description</th>
                                                        <th class="sorting" tabindex="0" aria-controls="data_table"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Email: activate to sort column ascending">
                                                            Status</th>
                                                        <th class="sorting" tabindex="0" aria-controls="data_table"
                                                            rowspan="1" colspan="1" style="width: 322.867px;"
                                                            aria-label="Email: activate to sort column ascending">
                                                            Expiry Date</th>
                                                        <th class="sorting" tabindex="0" aria-controls="data_table"
                                                            rowspan="1" colspan="1" style="width: 102.867px;"
                                                            aria-label="Email: activate to sort column ascending">
                                                            Prise(Rs)</th>
                                                       
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                        @foreach($fertilizers as $resource)
                                                            <tr role="row" class="odd selected">
                                                                <!-- <td class="sorting_1">{{$resource->id}}</td> -->
                                                                <td>{{$resource->name}}</td>
                                                                <td>{{$resource->description}}</td>
                                                                <td>
                                                                    @if($resource->status=="Good")
                                                                        <label class="badge badge-success">Good</label>
                                                                    @elseif($resource->status=="Normal")
                                                                        <label class="badge badge-info">Normal</label>
                                                                    @elseif($resource->status=="Bad")
                                                                        <label class="badge badge-danger">Bad</label>
                                                                    @endif
                                                                </td>
                                                                <td>{{$resource->exp_date}}</td>
                                                                <td>
                                                                {{$resource->price}}
                                                                </td>
                                                                
                                                            </tr>
                                                        @endforeach
                                                   
                                                </tbody>
                                            </table>
                                            @endif
                                            @endif    
                                </div>
                                <div class="tab-pane fade" id="nav-pesticides" role="tabpanel"
                                    aria-labelledby="nav-pesticides-tab">   
                                    @if(isset($pesticides))
                                            @if(count($pesticides)>0)
                                            <table id="data_table" class="table dataTable no-footer" role="grid"
                                                aria-describedby="data_table_info">
                                                <thead>
                                                    <tr role="row">
                                                        <!-- <th class="sorting_asc" tabindex="0" aria-controls="data_table"
                                                            rowspan="1" colspan="1" style="width: 50.9px;"
                                                            aria-sort="ascending"
                                                            aria-label="Id: activate to sort column descending">Id
                                                        </th> -->
                                                        <th class="sorting" tabindex="0" aria-controls="data_table"
                                                            rowspan="1" colspan="1" style="width: 209.45px;"
                                                            aria-label="Name: activate to sort column ascending">
                                                            Name</th>
                                                        <th class="sorting" tabindex="0" aria-controls="data_table"
                                                            rowspan="1" colspan="1" style="width: 322.867px;"
                                                            aria-label="Email: activate to sort column ascending">
                                                            Description</th>
                                                        <th class="sorting" tabindex="0" aria-controls="data_table"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Email: activate to sort column ascending">
                                                            Status</th>
                                                        <th class="sorting" tabindex="0" aria-controls="data_table"
                                                            rowspan="1" colspan="1" style="width: 322.867px;"
                                                            aria-label="Email: activate to sort column ascending">
                                                            Expiry Date</th>
                                                        <th class="sorting" tabindex="0" aria-controls="data_table"
                                                            rowspan="1" colspan="1" style="width: 102.867px;"
                                                            aria-label="Email: activate to sort column ascending">
                                                            Prise(Rs)</th>
                                                        <!-- <th class="sorting" tabindex="0" aria-controls="data_table"
                                                            rowspan="1" colspan="1" style="width: 52.867px;"
                                                            aria-label="Email: activate to sort column ascending">
                                                            Rating</th> -->
                                                        <!-- <th class="nosort sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 175.317px;" aria-label="&amp;nbsp;">&nbsp;
                                                        </th>
                                                        <th></th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                @foreach($pesticides as $resource)
                                                            <tr role="row" class="odd selected">
                                                                <!-- <td class="sorting_1">{{$resource->id}}</td> -->
                                                                <td>{{$resource->name}}</td>
                                                                <td>{{$resource->description}}</td>
                                                                <td>
                                                                    @if($resource->status=="Good")
                                                                        <label class="badge badge-success">Good</label>
                                                                    @elseif($resource->status=="Normal")
                                                                        <label class="badge badge-info">Normal</label>
                                                                    @elseif($resource->status=="Bad")
                                                                        <label class="badge badge-danger">Bad</label>
                                                                    @endif
                                                                </td>
                                                                <td>{{$resource->exp_date}}</td>
                                                                <td>
                                                                {{$resource->price}}
                                                                </td>
                                                                <!-- <td>NaN</td> -->
                                                                <!-- <td>
                                                                    <div class="table-actions">
                                                                        <a href="#" data-toggle="modal"
                                                                            data-target="#demoModal"><i
                                                                                class="ik ik-eye"></i></a>
                                                                        <a href="#"><i class="ik ik-edit-2"></i></a>
                                                                        <a href="#"><i class="ik ik-trash-2"></i></a>
                                                                    </div>
                                                                </td> -->
                                                            </tr>
                                                        @endforeach
                                                </tbody>
                                            </table>
                                            @endif
                                            @endif
                                </div>
                                <div class="tab-pane fade" id="nav-machinery" role="tabpanel"
                                    aria-labelledby="nav-machinery-tab">
                                    @if(isset($machineries))
                                            @if(count($machineries)>0)
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
                                                            rowspan="1" colspan="1"
                                                            aria-label="Email: activate to sort column ascending">
                                                            Status</th>
                                                        <th class="sorting" tabindex="0" aria-controls="data_table"
                                                            rowspan="1" colspan="1" style="width: 322.867px;"
                                                            aria-label="Email: activate to sort column ascending">
                                                            Expiry Date</th>
                                                        <th class="sorting" tabindex="0" aria-controls="data_table"
                                                            rowspan="1" colspan="1" style="width: 102.867px;"
                                                            aria-label="Email: activate to sort column ascending">
                                                            Prise(Rs)</th>
                                                           
                                                    
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                        @foreach($machineries as $resource)
                                                            <tr role="row" class="odd selected">
                                                              
                                                                <td>{{$resource->name}}</td>
                                                                <td>{{$resource->description}}</td>
                                                                <td>
                                                                    @if($resource->status=="Good")
                                                                        <label class="badge badge-success">Good</label>
                                                                    @elseif($resource->status=="Normal")
                                                                        <label class="badge badge-info">Normal</label>
                                                                    @elseif($resource->status=="Bad")
                                                                        <label class="badge badge-danger">Bad</label>
                                                                    @endif
                                                                </td>
                                                                <td>{{$resource->exp_date}}</td>
                                                                <td>
                                                                {{$resource->price}}
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
