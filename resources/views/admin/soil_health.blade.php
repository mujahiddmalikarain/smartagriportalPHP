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

                    @include('inc.messages')


                    <div class="row">
                        <!-- product and new customar start -->
                        <div class="col-md-12">
                            <div class="card table-card">
                                <div class="card-header">
                                    <h3>Soil Health</h3>
                                    <div class="card-header-right">
                                        <button data-toggle="modal" data-target="#demoModaladdnew" type="button"
                                            class="btn btn-primary mr-3" data-dismiss="modal">Add New</button>
                                    </div>
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
                                                    <th>Action</th>
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
                                                        <td><a href="/soil_health/{{$soil_health->id}}/edit"><i
                                                                    class="ik ik-edit f-16 mr-15 text-green"></i></a>

                                                            {!!Form::open(['action' => ['SoilHealthController@destroy', $soil_health->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
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
                        <!-- product and new customar end -->

                    </div>
                </div>
            </div>

            <div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="demoModalLabel">Soil Health Detail</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ action('SoilHealthController@store') }}" method="post" class="forms-sample">
                                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>                               
                                <div class="form-group row">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Soil Type</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="soil_type" class="form-control" id="exampleInputSeedName2"
                                            placeholder="Soil Type">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Nutrinal
                                        Value</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nutrinal" class="form-control" id="exampleInputDescription2"
                                            placeholder="Nutrinal">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputMobile" class="col-sm-3 col-form-label">Dring
                                        Quality</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="dring_quality" class="form-control" placeholder="Area">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Intake
                                        Rate</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="intake_rate" class="form-control" placeholder="Intake Rate1, Intake Rate2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Field
                                        Capacity</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="field_capacity" class="form-control" placeholder="Field Capacity1, Field Capacity2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Suitable
                                        Crops</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="suitable_crops" class="form-control" placeholder="Crop 1, Crop 2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputPassword2"
                                        class="col-sm-3 col-form-label">Composition</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="composition" class="form-control" placeholder="Composition1, Composition2">
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
                            <h5 class="modal-title" id="demoModalLabel">New Soil Health Card Detail</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                        <form action="{{ action('SoilHealthController@store') }}" method="post" class="forms-sample">
                                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>                               
                                <div class="form-group row">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Soil Type</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="soil_type" class="form-control" id="exampleInputSeedName2"
                                            placeholder="Soil Type">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Nutrinal
                                        Value</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nutrinal" class="form-control" id="exampleInputDescription2"
                                            placeholder="Nutrinal">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputMobile" class="col-sm-3 col-form-label">Dring
                                        Quality</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="dring_quality" class="form-control" placeholder="Area">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Intake
                                        Rate</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="intake_rate" class="form-control" placeholder="Intake Rate1, Intake Rate2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Field
                                        Capacity</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="field_capacity" class="form-control" placeholder="Field Capacity1, Field Capacity2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Suitable
                                        Crops</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="suitable_crops" class="form-control" placeholder="Crop 1, Crop 2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputPassword2"
                                        class="col-sm-3 col-form-label">Composition</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="composition" class="form-control" placeholder="Composition1, Composition2">
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
