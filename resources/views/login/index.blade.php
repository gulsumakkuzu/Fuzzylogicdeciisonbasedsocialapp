<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{asset('assets/images/favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/login.css')}}">
    <title>Social Network App - LogIn or SignUp</title>
</head>
<body>
   <header>
       <nav class="blue-header">
           <div class="container">
               <div class="row" style="padding-top:25px">
                   <div class="col-lg-5">
                        <span class="h5"><a class="text-white" href="{{url('/')}}">Social Network App</a></span>
                   </div>
                   <div class="col-lg-7">
                       <div class="row">
                       <form method="POST" action="{{url('check')}}" class="s-login">
                        <div class="row">
                            <div class="col-lg-4" style="padding-left: 7px !important;padding-right: 7px !important">
                            <input type="email" name="email" id="u_name" value="{{old('email')}}" placeholder="Email" class="form-control form-control-sm">
                            </div>
                            <div class="col-lg-4" style="padding-left: 7px !important;padding-right: 7px !important">
                                <input type="password" name="password" placeholder="Password" id="u_password" class="form-control form-control-sm">
                            </div>
                            <div class="col-lg-4" style="padding-left: 7px !important;padding-right: 7px !important">
                                @csrf
                                <input type="submit" value="Log In" class="btn btn-primary btn-sm">
                                <a class="text-light text-sm" style="font-size:smaller" href="#"> &nbsp;Forgotten account?</a>
                            </div>
                        </div>
                    </form>
                    </div>
                   </div>
               </div>
           </div>
       </nav>
   </header>

   <section>
       <div class="container">
           <div class="row">
                <div class="col-lg-6">
                    <h1>Create an account</h1>
                    @if ($errors->any())
                    <hr>
                            <div class="alert alert-info">
                                <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                            </div>
                        @endif
                </div>
                <div class="col-lg-6">
                    <form class="form-horizontal" method="POST">
                    @csrf
                        <div class="form-group">
                            <label for="ct_name">First Name</label>
                            <input type="text" name="first_name" id="first_name" value="{{old('first_name')}}" class="form-control form-control-lg">
                        </div>
                        <div class="form-group">
                                <label for="ct_surname">Surname</label>
                                <input type="text" name="surname" id="last_name" value="{{old('surname')}}" class="form-control form-control-lg">
                        </div>
                        <div class="form-group">
                                <label for="ct_email">Email</label>
                                <input type="email" name="email" id="email" value="{{old('email')}}" class="form-control form-control-lg">
                        </div>
                        <div class="form-group">
                                <label for="ct_password">Password</label>
                                <input type="password" name="password" id="password" class="form-control form-control-lg">
                        </div>
                        <div class="form-group">
                                <input type="submit" value="Sign Up" class="btn btn-success btn-lg">
                        </div>
                        @if(Session::has('status'))
                            <div class="alert alert-{{session('color')}} alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{session('status')}}
                            </div>
                        @endif
                    </form>
                </div>
           </div>
       </div>
   </section>
   <script src="{{asset('assets/js/jquery-3.3.1.slim.min.js')}}"></script>
   <script src="{{asset('assets/js/popper.min.js')}}"></script>
   <script src="{{asset('assets/js/bootstrap.js')}}"></script>
</body>
</html>