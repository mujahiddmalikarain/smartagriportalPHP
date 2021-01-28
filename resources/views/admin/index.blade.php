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
                                    <i class="ik ik-users bg-blue"></i>
                                    <div class="d-inline">
                                        <h5>Users</h5>
                                        <span>Smart Agriculture System</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <nav class="breadcrumb-container" aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="index.html"><i class="ik ik-home"></i></a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">Users</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header d-block">
                                    <h3>Manage Users</h3>
                                </div>
                                    @if(isset($users))
                                        @if(count($users)>0)
                                        <div class="card-body">
                                            <div class="dt-responsive">
                                                <div id="simpletable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <table id="data_table" class="table dataTable no-footer" role="grid"
                                                                aria-describedby="data_table_info">
                                                                <thead>
                                                                    <tr role="row">
                                                                        <th class="sorting" tabindex="0"
                                                                            aria-controls="data_table" rowspan="1" colspan="1"
                                                                            style="width: 209.45px;"
                                                                            aria-label="Name: activate to sort column ascending">
                                                                            Name</th>
                                                                        <th class="sorting" tabindex="0"
                                                                            aria-controls="data_table" rowspan="1" colspan="1"
                                                                            style="width: 102.867px;"
                                                                            aria-label="Email: activate to sort column ascending">
                                                                            Type</th>
                                                                        <th class="sorting" tabindex="0"
                                                                            aria-controls="data_table" rowspan="1" colspan="1"
                                                                            style="width: 102.867px;"
                                                                            aria-label="Email: activate to sort column ascending">
                                                                            Status</th>
                                                                        <th class="sorting" tabindex="0"
                                                                            aria-controls="data_table" rowspan="1" colspan="1"
                                                                            style="width: 192.867px;"
                                                                            aria-label="Email: activate to sort column ascending">
                                                                            Date Account</th>
                                                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1"
                                                                            style="width: 175.317px;" aria-label="&amp;nbsp;">
                                                                            Actions
                                                                        </th>
                                                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1"
                                                                            style="width: 175.317px;" aria-label="&amp;nbsp;">
                                                                            &nbsp;
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($users as $user)
                                                                    <tr role="row" class="odd selected">
                                                                        <td>{{$user->name}}</td>
                                                                        <td>{{$user->utype}}
                                                                        </td>
                                                                        <td>
                                                                            @if($user->status=="Active")
                                                                                <label class="badge badge-success">{{$user->status}}</label>
                                                                            @else
                                                                                <label class="badge badge-danger">{{$user->status}}</label>
                                                                            @endif
                                                                        </td>
                                                                        <td>{{$user->created_at}}</td>
                                                                        <td>
                                                                            <form action="{{ route('changeUserStatus') }}" method="post">
                                                                                {{ csrf_field() }}
                                                                                <input type="hidden" name="id" class="btn-sm btn-danger" value="{{$user->id}}">

                                                                                @if($user->status=="Active")
                                                                                    <input type="submit" class="btn-sm btn-danger" value="Ban">
                                                                                @else
                                                                                    <input type="submit" class="btn-sm btn-success" value="Activate">
                                                                                @endif
                                                                            </form>
                                                                            <!-- <div class="table-actions">
                                                                                <a href="#" data-toggle="modal"
                                                                                    data-target="#demoModal"><i
                                                                                        class="ik ik-eye"></i></a>
                                                                                <a href="#"><i class="ik ik-edit-2"></i></a>
                                                                                <a href="#"><i class="ik ik-trash-2"></i></a>
                                                                            </div> -->
                                                                        </td>
                                                                        <td></td>
                                                                    </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endif
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
                            <h5 class="modal-title" id="demoModalLabel">User Detail</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form class="forms-sample">
                                <div class="form-group row">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">User Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="exampleInputSeedName2"
                                            placeholder="User Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="exampleInputDescription2"
                                            placeholder="Email">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="exampleSelectGender" class="col-sm-3 col-form-label">Type</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="exampleSelectGender">
                                            <option>Farmer</option>
                                            <option>Govt. vendor</option>
                                            <option>Private vendor</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="exampleSelectGender" class="col-sm-3 col-form-label">Status</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="exampleSelectGender">
                                            <option>Active</option>
                                            <option>Ban</option>
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
