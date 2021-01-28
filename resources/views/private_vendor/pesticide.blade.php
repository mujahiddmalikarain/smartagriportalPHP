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
                                        <h5>Resources | Pesticide</h5>
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
                                            <a href="#">Resouces</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">Pesticide</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    @include('inc.messages')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Pesticides Detail</h3>
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
                                                        data-dismiss="modal">Add New Pesticide</button>
                                                    <input type="search" class="form-control form-control-sm"
                                                        placeholder="Search" aria-controls="data_table"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-sm-12">
                                        @if(isset($resources))
                                            @if(count($resources)>0)
                                            <table id="data_table" class="table dataTable no-footer" role="grid"
                                                aria-describedby="data_table_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting_asc" tabindex="0" aria-controls="data_table"
                                                            rowspan="1" colspan="1" style="width: 50.9px;"
                                                            aria-sort="ascending"
                                                            aria-label="Id: activate to sort column descending">Id
                                                        </th>
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
                                                        <th class="nosort sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 175.317px;" aria-label="&amp;nbsp;">&nbsp;
                                                        </th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                @foreach($resources as $resource)
                                                            <tr role="row" class="odd selected">
                                                                <td class="sorting_1">{{$resource->id}}</td>
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
                                                                <td>
                                                                    <div class="table-actions">
                                                                        <!-- <a href="#" data-toggle="modal"
                                                                            data-target="#demoModal"><i
                                                                                class="ik ik-eye"></i></a> -->
                                                                        <a href="/pesticide/{{$resource->id}}/edit"><i class="ik ik-edit-2"></i></a>
                                                                        {!!Form::open(['action' => ['PesticideController@destroy', $resource->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
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
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="demoModalLabel">Pesticides Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ action('PesticideController@store') }}" method="post" class="form-sample">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>  
 
                        <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Pesticide Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" id="exampleInputPesticideName2"
                                        placeholder="Pesticide Name">
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
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Expiry Date</label>
                                <div class="col-sm-9">
                                    <input type="date" name="exp_date" class="form-control" placeholder="Expiry Date">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Prise(Rs)</label>
                                <div class="col-sm-9">
                                    <input type="number" name="price" class="form-control" placeholder="Prise(Rs)">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="exampleSelectGender" class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="status" id="exampleSelectGender">
                                        <option value="Good">Good</option>
                                        <option value="Normal">Normal</option>
                                        <option value="Bad">Bad</option>
                                    </select>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Update</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="demoModaladdnew" tabindex="-1" role="dialog" aria-labelledby="demoModaladdnewLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="demoModalLabel">Add New Pesticide Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                    <form action="{{ action('PesticideController@store') }}" method="post" class="form-sample">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>  
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Pesticide Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" id="exampleInputPesticideName2"
                                        placeholder="Pesticide Name">
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
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Expiry Date</label>
                                <div class="col-sm-9">
                                    <input type="date" name="exp_date" class="form-control" placeholder="Expiry Date">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Prise(Rs)</label>
                                <div class="col-sm-9">
                                    <input type="number" name="price" class="form-control" placeholder="Prise(Rs)">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="exampleSelectGender" class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="status" id="exampleSelectGender">
                                        <option value="Good">Good</option>
                                        <option value="Normal">Normal</option>
                                        <option value="Bad">Bad</option>
                                    </select>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Add</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
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
