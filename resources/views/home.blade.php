@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <h2>Smart Agriculture System</h2>
            <!-- <p>You're logged in!</p> -->
            <h5 class="text-danger">You are unable to access dashboard because your account is blocked by admin!</h5>

            <a class="dropdown-item h5" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</div>
@endsection
