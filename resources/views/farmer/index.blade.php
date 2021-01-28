@extends('layouts.farmer')
@section('content')
<?php 
    function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);
    
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
    
        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }
    
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }
?>
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
                                    <a href="/farmer/weather" class="menu-item">Weather Report</a>
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
                                    <i class="ik ik-users bg-blue"></i>
                                    <div class="d-inline">
                                        <h5>Community</h5>
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
                                        <li class="breadcrumb-item active" aria-current="page">Community</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    @include('inc.messages')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                               
                                <div class="tab-pane fade show active" id="current-month" role="tabpanel"
                                    aria-labelledby="pills-timeline-tab">
                                   
                                    <div class="card-body">
                                    
                                        <div class="card">
                                        <form action="{{ action('FourmController@store') }}" method="post" class="card-body" enctype="multipart/form-data">
                                            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                                <div class="form-group">
                                                    <textarea name="description" placeholder="Your Post" id="" rows="4" class="form-control"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <input type="file" name="ffile" id="" accept=""> 
                                                </div>

                                                <input type="submit" value="Post" class="btn btn-primary">
                                            </form>
                                        </div>

                                        <h5>Recent Posts</h5>
                                        <hr>
                                        <div class="profiletimeline mt-0">
                                            @if(isset($posts))
                                                @if(count($posts)>0)
                                                @foreach($posts as $post)
                                                    <div class="sl-item">
                                                        <div class="sl-left"> <img src="/avatar.png" alt="user"
                                                                class="rounded-circle" /> </div>
                                                        <div class="sl-right">
                                                            <div><a href="javascript:void(0)" class="link">{{$post->name}}</a>
                                                                <span class="sl-date"><?php echo time_elapsed_string($post->created_at); ?> 
                                                                @if($post->user_id==Auth::user()->id)
                                                                    <a href="/fourm/{{$post->id}}/edit"><i
                                                                    class="ik ik-edit f-16 mr-15 text-green"></i></a>
                                                                    {!!Form::open(['action' => ['FourmController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                                                    {{Form::hidden('_method','DELETE')}}
                                                                    <button type="submit" class="btn btn-sm"><i class="ik ik-trash-2 f-16 text-red"></i></button>
                                                                {!!Form::close()!!}
                                                                @endif
                                                                </span>
                                                                <p>{{$post->description}}</a></p>
                                                                <div class="row">
                                                                    <div class="col-lg-3 col-md-6 mb-20"><img
                                                                            src="/storage/fourm/{{$post->file}}" class="img-fluid rounded" />
                                                                    </div>
                                                                </div>
                                                                
                                                                <!-- <div class="like-comm">
                                                                    <a href="javascript:void(0)" class="link mr-10">2
                                                                        comment</a>
                                                                    <a href="javascript:void(0)" class="link mr-10"><i
                                                                            class="fa fa-heart text-danger"></i> 5 Love</a>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
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
