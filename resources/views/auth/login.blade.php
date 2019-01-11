<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
 
  <title>Diving Reservation System.</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{URL::to('css/bootstrap.min.css')}}">
  
    <script src="{{URL::to('js/jquery.js')}}"></script>
    <script src="{{URL::to('js/bootstrap.min.js')}}"></script>
  <style>
  body {
      font: 400 15px Lato, sans-serif;
      line-height: 1.8;
      color: #818181;
      background-image: url("{{URL::to('image/bg.jpg')}}");  
    background-attachment: fixed;
    background-size: auto 100%;
    background-position: center;
  }
  h2 {
      font-size: 24px;
      text-transform: uppercase;
      color: #303030;
      font-weight: 600;
      margin-bottom: 30px;
  }
  h4 {
      font-size: 19px;
      line-height: 1.375em;
      color: #303030;
      font-weight: 400;
      margin-bottom: 30px;
  }  
 
 
  .panel-footer {
      background-color: white !important;
  }
  .panel-footer h3 {
      font-size: 32px;
  }
  .panel-footer h4 {
      color: #aaa;
      font-size: 14px;
  }
  .panel-footer .btn {
      margin: 15px 0;
      background-color: #f4511e;
      color: #fff;
  }
  .navbar {
      margin-bottom: 0;
      background-color: #2980b9;
      z-index: 9999;
      border: 0;
      font-size: 12px !important;
      line-height: 1.42857143 !important;
      letter-spacing: 4px;
      border-radius: 0;
      font-family: Montserrat, sans-serif;
      opacity: 0.7 !important;
  }
  
  .navbar li a, .navbar .navbar-brand {
      color: #fff !important;
  }
  .navbar-nav li a:hover, .navbar-nav li.active a {
      color: #f4511e !important;
      background-color: #fff !important;
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
      color: #fff !important;
  }
  footer .glyphicon {
      font-size: 20px;
      margin-bottom: 20px;
      color: #f4511e;
  }
  
  .input-group{
    margin-bottom: 20px;
  }
  .well{
    margin-top: 8%;
    opacity: 0.9;
  }

  
  </style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#myPage">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{url('/')}}">HOME</a></li>
        <li><a href="{{route('auth_login')}}">LOGIN</a></li>
      </ul>
    </div>
  </div>
</nav>



<div class="container" style="margin-top: 10%">
  
  <div class="col-md-4 col-md-offset-4 well">
    <p class="text-center">
      <img src="{{URL::to('image/login.png')}}" class="img-rounded" width="120px">
    </p>
    
    @if(Session::has('err'))
      <div class="alert alert-danger">
          {{Session::get('err')}}
      </div>
    @endif
    <form action="{{route('login_check')}}" method="POST" id="loginForm">
      <div class="input-group {{$errors->has('username') ? 'has-error': ''}}">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input id="email" type="text" class="form-control" name="username" placeholder="Username">
      </div>
      <div class="input-group {{$errors->has('password') ? 'has-error': ''}}">
        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        <input id="password" type="password" class="form-control" name="password" placeholder="Password">
      </div>
       @csrf
        <button class="btn btn-primary btn-sm btn-block" type="submit">SUBMIT</button>
    </form>
    <p class="text-center">
      <a href="{{route('auth_register')}}">Register</a>
    </p>
  </div>
</div>


<footer class="container-fluid text-center">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p class="text-center">All Right Reserved @ Jody Lyn Egsoc</p>
</footer>


</body>
</html>
