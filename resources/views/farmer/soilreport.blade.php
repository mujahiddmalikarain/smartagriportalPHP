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
                                        <h5>Soil Health</h5>
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
                                            <a href="#">Environment</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">Soil Health</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- product and new customar start -->
                        <div class="col-md-12">
                            <div class="card table-card">
                                <div class="card-header">
                                    <h3>Soil Health</h3>
                                    
                                </div>
                                <div class="card-block pb-0">
                                    <div class="table-responsive">
                                    @if(isset($soil_healths))
                                        @if(count($soil_healths)>0)
                                        <table class="table table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Soil Type</th>
                                                    <th>Nutrinal Value</th>
                                                    <th>Dring Quality</th>
                                                    <th>Intake Rate</th>
                                                    <th>Field Capacity</th>
                                                    <th>Crops Suitable</th>
                                                    <th>Composition</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($soil_healths as $soil_health)
                                                    <tr>
                                                        <td>{{$soil_health->soil_type}}</td>
                                                        <td> <label class="badge badge-warning">{{$soil_health->nutrients}}</label>
                                                        </td>
                                                        <td> <label class="badge badge-primary">{{$soil_health->dring_quality}}</label></td>
                                                        <td>
                                                        <?php
                                                            $irs = explode(',', $soil_health->intake_rate);
                                                            foreach ($irs as $ir) {
                                                                ?>
                                                                 <label class="badge badge-primary">{{$ir}}</label>
                                                                <?php
                                                            }
                                                        ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                                $fcs = explode(',', $soil_health->field_capacity);
                                                                foreach ($fcs as $fc) {
                                                                    ?>
                                                                    <label class="badge badge-primary">{{$fc}}</label>
                                                                    <?php
                                                                }
                                                            ?>
                                                        </td>
                                                        <td> 
                                                            <?php
                                                                $scs = explode(',', $soil_health->suitable_crops);
                                                                foreach ($scs as $sc) {
                                                                    ?>
                                                                    <label class="badge badge-primary">{{$sc}}</label>
                                                                    <?php
                                                                }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                                $comps = explode(',', $soil_health->composition);
                                                                foreach ($comps as $comp) {
                                                                    ?>
                                                                    <label class="badge badge-primary">{{$comp}}</label>
                                                                    <?php
                                                                }
                                                            ?>
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
                        <!-- product and new customar end -->

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
