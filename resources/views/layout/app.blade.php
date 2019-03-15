<?php use Illuminate\Support\Str;?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="icon" href="{{asset('assets/images/favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/solid.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/social.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/cropper.css')}}">
    <title>@yield('title')</title>
</head>
<body>
        <nav class="navbar navbar-expand-lg fixed-top blue-header-home">
            <div class="container">
                <a class="navbar-brand social-n-a" href="{{url('home')}}">Social Network</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <input class="form-control mr-2" autocomplete="off" type="search" id="search" placeholder="Search a friend">
                    <div class="search_box">
                      <div class="list-group" id="search_friends">
                      </div>
                      <div class="list-group" id="result_all"></div>
                    </div>
                  <ul class="navbar-nav col-auto">
                    <li class="nav-item">
                    <a class="nav-link" href="{{url('profile')}}/{{$user->id}}/{{Str::slug($user->first_name.$user->last_name)}}"><i class="fas fa-user-circle"></i> {{$user->first_name}} {{$user->last_name}}</a>
                    </li>
                    <li class="nav-item dropdown">
                            <button type="button" class="btn btn-outline-light nav-link dropdown-toggle" style="border-color:transparent" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell"></i> <span class="badge badge-danger">1</span>
                            </button>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">A Friend Request A Friend Request</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{url('notification')}}"><i class="fas fa-eye"></i> See All</a>
                      </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">Profile</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{url("#")}}"><i class="fas fa-cog text-secondary"></i> Update Password or Profile</a>
                          <a class="dropdown-item" href="{{url('logout')}}"><i class="fas fa-sign-out-alt text-secondary"></i> Logout</a>
                        </div>
                      </li>
                  </ul>
                </div>
            </div>
         </nav>
@yield('content')
<script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('assets/js/cropper.min.js')}}"></script>
   <script src="{{asset('assets/js/popper.min.js')}}"></script>
   <script src="{{asset('assets/js/social.js')}}"></script>
   <script src="{{asset('assets/js/bootstrap.js')}}"></script>
</body>
</html>