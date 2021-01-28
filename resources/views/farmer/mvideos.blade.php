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
                                    <i class="ik ik-layers bg-blue"></i>
                                    <div class="d-inline">
                                        <h5>Motivational Videos</h5>
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
                                        <li class="breadcrumb-item active" aria-current="page">Motivational Videos</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Motivational Videos Detail</h3>
                                </div>
                                <div class="card-body">
                                    <div id="data_table_wrapper"
                                        class="dataTables_wrapper dt-bootstrap4 no-footer py-3">
                                        <div class="row mb-5">
                                            <div class="col-sm-12 col-md-6">
                                            </div>
                                            <div class="col-sm-12 col-md-6">

                                                <!-- <div id="data_table_filter"
                                                    class="dataTables_filter d-flex justify-content-end pr-2">
                                                   
                                                    <input type="search" class="form-control form-control-sm"
                                                        placeholder="Search" aria-controls="data_table"></div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-sm-12">
                                        @if(isset($mvideos))
                                        @if(count($mvideos)>0)
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
                                                            rowspan="1" colspan="1" style="width: 322.867px;"
                                                            aria-label="Youtube Link">
                                                            Link</th>
                                                           
                                                        <th class="nosort sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 175.317px;" aria-label="&amp;nbsp;">&nbsp;
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($mvideos as $mvideo)
                                                        <tr role="row" class="odd selected">
                                                            <td>{{$mvideo->name}}</td>
                                                            <td>{{$mvideo->description}}
                                                            </td>
                                                            @if($mvideo->url)
                                                            <td>
                                                                <a href="{{$mvideo->url}}" target="_blank">Video Link</a>
                                                            </td>
                                                            @else
                                                            <td>
                                                                <div class="table-actions">
                                                                    <a href="/storage/mvideos/{{$mvideo->file}}" target="_blank"><i class="ik ik-eye"></i></a>
                                                                </div>
                                                            </td>
                                                            @endif
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

                    <!-- <div class="row">
                        <div class="col-md-12">
                            <section class="main-preview-player">
                                <div class="video-container">
                                    <video id="preview-player" class="video-js vjs-fluid" controls preload="auto"
                                        data-setup='{}'>
                                        <p class="vjs-no-js">
                                            To view this video please enable JavaScript, and consider upgrading to a
                                            web browser that
                                            <a href="http://videojs.com/html5-video-support/" target="_blank">supports
                                                HTML5 video</a>
                                        </p>
                                    </video>
                                </div>
                                <div class="playlist-container  preview-player-dimensions vjs-fluid">
                                    <div class="vjs-playlist"></div>
                                </div>
                            </section>
                        </div>
                    </div> -->

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
