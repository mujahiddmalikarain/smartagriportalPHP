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
                                    <i class="ik ik-sun bg-blue"></i>
                                    <div class="d-inline">
                                        <h5>Weather Check</h5>
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
                                            <a href="#">Environment</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">Weather</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Search Weather<span
                                            class="badge badge-pill badge-secondary mb-1">Weather API</span></h3>
                                </div>
                                <div class="card-body">
                                <form action="{{ action('WeatherController@store') }}" method="post" class="forms-sample">
                                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">City Name</label>
                                            <input type="text" name="city" class="form-control" id="exampleInputUsername1"
                                                placeholder="Lahore">
                                        </div>

                                        <button type="submit" class="btn btn-primary mr-2">Search</button>
                                    </form>
                                </div>
                            </div>
                            @include('inc.messages')
                        </div>

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    @if(isset($c_weather))
                                    <div class="d-flex">
                                        <h4 class="card-title">Weather Report</h4>
                                        <!-- <select class="form-control w-25 ml-auto">
                                            <option selected="">Today</option>
                                            <option value="1">Weekly</option>
                                        </select> -->
                                    </div>
                                    <div class="d-flex align-items-center flex-row mt-10">
                                        <div class="p-2 f-50 text-info">{{$c_weather->weather_state_name}}
                                            <span>{{$c_weather->the_temp}}<sup>°</sup></span></div>
                                        <div class="p-2">
                                            <h3 class="mb-0"><?php echo date('D', strtotime($time)); ?>, (<?php echo date("jS F, Y", strtotime($time)); ?>) |  {{$title}}</h3>
                                            
                                        </div>
                                    </div>
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td>Wind</td>
                                                <td class="font-medium">{{$c_weather->wind_speed}}</td>
                                            </tr>
                                            <tr>
                                                <td>Humidity</td>
                                                <td class="font-medium">{{$c_weather->humidity}}</td>
                                            </tr>
                                            <tr>
                                                <td>Pressure</td>
                                                <td class="font-medium">{{$c_weather->air_pressure}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <hr>
                                    <ul class="list-unstyled row text-center city-weather-days mb-0">
                                        <li class="col">Weather State Abbrivation
                                            <h5>{{$c_weather->weather_state_abbr}}</h5>
                                        </li>
                                        <li class="col">Weather Direction
                                            <h5>{{$c_weather->wind_direction_compass}}</h5>
                                        </li>
                                        <li class="col">Longitude & Latitude
                                            <h5>{{$longlat}}</h5>
                                        </li>
                                        <li class="col">Timezone
                                            <h5>{{$timezone}}</h5>
                                        </li>
                                    </ul>
                                    @endif

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
