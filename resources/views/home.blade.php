<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
 
  <title>Diving Reservation System.</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Dive You Go">
  <meta name="author" content="Jody Lyn Egsoc">
  <meta name="keyword" content="Diving,Reservation,Diving Reservation">
  
    <link rel="stylesheet" type="text/css" href="{{URL::to('css/bootstrap.min.css')}}">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <script src="{{URL::to('js/jquery.js')}}"></script>
    <script src="{{URL::to('js/bootstrap.min.js')}}"></script>
  <style>
  body {
      font: 400 15px Lato, sans-serif;
      line-height: 1.8;
      color: #818181;
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
  .jumbotron {
     
      color: #fff;
      padding: 100px 25px;
      font-family: Montserrat, sans-serif;
  }
  .container-fluid {
      padding: 60px 50px;
  }
  .bg-grey {
      background-color: #f6f6f6;
  }
  .logo-small {
      color: #f4511e;
      font-size: 50px;
  }
  .logo {
      color: #2980b9;
      font-size: 200px;
  }
  .thumbnail {
      padding: 0 0 15px 0;
      border: none;
      border-radius: 0;
  }
  .thumbnail img {
      width: 100%;
      height: 100%;
      margin-bottom: 10px;
  }
  
  .item h4 {
      font-size: 19px;
      line-height: 1.375em;
      font-weight: 400;
      font-style: italic;
      margin: 70px 0;
  }
  .item span {
      font-style: normal;
  }
  .panel {
      border: 1px solid #2980b9; 
      border-radius:0 !important;
      transition: box-shadow 0.5s;
  }
  .panel:hover {
      box-shadow: 5px 0px 40px rgba(0,0,0, .2);
  }
  .panel-footer .btn:hover {
      border: 1px solid #f4511e;
      background-color: #fff !important;
      color: #f4511e;
  }
  .panel-heading {
      color: #fff !important;
      background-color: #2980b9 !important;
      padding: 25px;
      border-bottom: 1px solid transparent;
      border-top-left-radius: 0px;
      border-top-right-radius: 0px;
      border-bottom-left-radius: 0px;
      border-bottom-right-radius: 0px;
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
  .btn-danger{
    background-color: #2980b9 !important;
    border: 1px solid white;
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
  .slideanim {visibility:hidden;}
  .slide {
      animation-name: slide;
      -webkit-animation-name: slide;
      animation-duration: 1s;
      -webkit-animation-duration: 1s;
      visibility: visible;
  }
  @keyframes slide {
    0% {
      opacity: 0;
      transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      transform: translateY(0%);
    }
  }
  @-webkit-keyframes slide {
    0% {
      opacity: 0;
      -webkit-transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      -webkit-transform: translateY(0%);
    }
  }
  @media screen and (max-width: 768px) {
    .col-sm-4 {
      text-align: center;
      margin: 25px 0;
    }
    .btn-lg {
        width: 100%;
        margin-bottom: 35px;
    }
  }
  @media screen and (max-width: 480px) {
    .logo {
        font-size: 150px;
    }
  }

  .jumbotron{
    background-image: url("{{URL::to('image/bg2.jpg')}}");  
    background-attachment: fixed;
    background-size: auto 100%;
    background-position: center;
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
        <li><a href="#about">ABOUT</a></li>
        <li><a href="#services">EQUIPMENTS</a></li>
        <li><a href="#portfolio">DIVING</a></li>
        <li><a href="#pricing">ACCOMODATIONS</a></li>
        <li><a href="#contact">CONTACT</a></li>
        <li><a href="{{route('auth_login')}}">LOGIN</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="jumbotron text-center">
  <h1>Dive You Go</h1> 
  <p>Dive You Want? Dive You Go.</p> 
  <p class="text-center">
      
      <a href="{{route('customer_reservation')}}" class="btn btn-danger">Reserve Now</a>
  </p>
</div>

<!-- Container (About Section) -->
<div id="about" class="container-fluid">
  <div class="row">
    <div class="col-sm-8">
      <h2>About Company Page</h2><br>
      <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h4><br>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
     
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-signal logo"></span>
    </div>
  </div>
</div>

<div class="container-fluid bg-grey">
  <div class="row">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-globe logo slideanim"></span>
    </div>
    <div class="col-sm-8">
      <h2>Our Values</h2><br>
      <h4><strong>MISSION:</strong> Our mission lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h4><br>
      <p><strong>VISION:</strong> Our vision Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
  </div>
</div>

<!-- Container (Services Section) -->
<div id="services" class="container-fluid text-center">
  <h2>EQUIPMENTS</h2>
  <h4>What we offer</h4>
  <br>
  <div class="row slideanim">
    <div class="col-sm-4">
      <img src="{{URL::to('equipments/bcd.png')}}" class="img-thumbnail" alt="bcd" width="100px" height="100px">
      <h4>BCD</h4>
      <p>PHP 200 per day</p>
    </div>
    <div class="col-sm-4">
      <img src="{{URL::to('equipments/mask.png')}}" class="img-thumbnail" alt="mask" width="100px" height="100px">
      <h4>MASK</h4>
      <p>PHP 50 per day</p>
    </div>
    <div class="col-sm-4">
      <img src="{{URL::to('equipments/regulator.png')}}" class="img-thumbnail" alt="regulator" width="100px" height="100px">
      <h4>REGULATOR</h4>
      <p>PHP 250 per day</p>
    </div>
  </div>
  <br><br>
  <div class="row slideanim">
    <div class="col-sm-4">
       <img src="{{URL::to('equipments/weights.png')}}" class="img-thumbnail" alt="weights" width="100px" height="100px">
      <h4>WEIGHTS</h4>
      <p>PHP 30 per pc. per day</p>
    </div>
    <div class="col-sm-4">
       <img src="{{URL::to('equipments/wetsuite.png')}}" class="img-thumbnail" alt="wetsuite" width="100px" height="100px">
      <h4>WETSUITE</h4>
      <p>PHP 100 per day</p>
    </div>
    <div class="col-sm-4">
      <img src="{{URL::to('equipments/flashlight.png')}}" class="img-thumbnail" alt="flashlight" width="100px" height="100px">
      <h4 style="color:#303030;">FLASHLIGHT</h4>
      <p>PHP 250 per day</p>
    </div>
  </div>
  <div class="row slideanim">
    <div class="col-sm-4">
       <img src="{{URL::to('equipments/fins.png')}}" class="img-thumbnail" alt="fins" width="100px" height="100px">
      <h4>FINS</h4>
      <p>PHP 100 per day</p>
    </div>
    <div class="col-sm-4">
       <img src="{{URL::to('equipments/belt.png')}}" class="img-thumbnail" alt="belt" width="100px" height="100px">
      <h4>BELT</h4>
      <p>PHP 30 per day</p>
    </div>
    <div class="col-sm-4">
      <img src="{{URL::to('equipments/boots.png')}}" class="img-thumbnail" alt="boots" width="100px" height="100px">
      <h4 style="color:#303030;">BOOTS</h4>
      <p>PHP 50 per day</p>
    </div>
  </div>
</div>

<!-- Container (Portfolio Section) -->
<div id="portfolio" class="container-fluid text-center bg-grey">
  <h2>DIVING RATES</h2><br>
 
  <div class="row text-center slideanim">
    <div class="col-md-6 col-md-offset-3 col-sm-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1>FUN DIVE</h1>
        </div>
        <div class="panel-body">
          <p><strong>P1,200</strong> </p>
          <p>
            Without own dive gears/equipment Includes boat, tanks, equipment’s, dive guide
          </p>
          <p><strong>PHP 1,000 </strong> </p>
          <p>
            With own dive gears/equipment Includes boat, tanks, weights, dive guide.
          </p>
          <p><strong>Endless</strong> Amet</p>
        </div>
        <div class="panel-footer">
          <h5>*NIGHT DIVE additional PHP 200</h5>
          
        </div>
      </div> 
    </div>
   
    
  </div><br>
  
  
  
</div>

<!-- Container (Pricing Section) -->
<div id="pricing" class="container-fluid">
  <div class="text-center">
    <h2>ACCOMODATION ROOMS</h2>
    
  </div>
  <div class="row slideanim">
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h5>STEPS & GARDEN RESORT</h5>
        </div>
        <div class="panel-body">
          <p><strong>SUITE ROOM</strong> P3,250</p>
          <p><strong>JR. SUITE ROOM</strong> P2,750</p>
          <p><strong>SUPERIOR ROOM</strong> P2,000</p>
          <p><strong>STANDARD </strong> P1,800</p>
          <p><strong>EXECUTIVE</strong> P3,950</p>
          <p><strong>FAMILY ROOM</strong> P4,950</p>
        </div>
        
      </div>      
    </div>     
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h5>MANARRA RESORT</h5>
        </div>
        <div class="panel-body">
          <p><strong>DELUXE ROOM (Good for 2 pax)</strong> P3,900</p>
          <p><strong>SUITE ROOM (Good for 2pax)</strong> P5,000</p>
          <p><strong>EXECUTIVE (Good for 3 pax)</strong> P5,600</p>
          <p><strong>FAMILY ROOM (Good for 4pax)</strong> P9,680</p>
          <p><strong>STANDARD FAMILY ROOM(Good for 4pax)</strong> P2,300</p>
          <p><strong>STANDARD ROOM (Good for 2 pax)</strong> P1,800</p>
          <p><strong>STANDARD ROOM w/Kitchen (Good for 2 pax)</strong> P2,500</p>
        </div>
       
      </div>      
    </div>       
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h5>ANGELYNS RESORT</h5>
        </div>
        <div class="panel-body">
          <p><strong>CABIN ROOM</strong> P2,100</p>
          <p><strong>BUNGALOW</strong> P2,250</p>
          <p><strong>LODGE</strong> P2,350</p>
          <p><strong>DELUXE</strong> P2,700</p>
          <p><strong>DELUXE CABIN</strong> P2,900</p>
          <p><strong>SEAVIEW</strong> P3,150</p>
        </div>
      
      </div>      
    </div>    
    <div class="col-sm-4 col-md-offset-1 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h5>TROPICANA CASTLE</h5>
        </div>
        <div class="panel-body">
          <p><strong>DELUXE ROOM (Good for 2pax)</strong> P2,250</p>
          <p><strong>SUITE ROOM (Good for 2pax)</strong> P2,750</p>
          <p><strong>CHINA SUITE ROOM (Good for 2 pax)</strong> P3,000</p>
          <p><strong>TWIN BED ROOM (Good for 4 pax)</strong> P4,000</p>
          <p><strong>FAMILY ROOM (Good For 4 pax)</strong> P4,500</p>
          <p><strong>PENTHOUSE (Good for 2pax)</strong> P5,000</p>
          <p><strong>DOME</strong> P6,000</p>
        </div>
        
      </div>      
    </div>    
    <div class="col-sm-4 col-md-offset-1 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h5>TRIPLE "AAA" HOTEL</h5>
        </div>
        <div class="panel-body">
          <p><strong>Single Bed Room</strong> P1,200</p>
          <p><strong>Double Bed room 2 pax</strong> P1,500</p>
          <p><strong>Double Bed room 4 pax</strong> P1,700</p>
          
        </div>
       
      </div>      
    </div> 


  </div>
</div>

<!-- Container (Contact Section) -->
<div id="contact" class="container-fluid bg-grey">
  <h2 class="text-center">CONTACT</h2>
  <div class="row">
    <div class="col-sm-5">
      <p>Contact us and we'll get back to you within 24 hours.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span> Sabang Beach Puerto Gallera</p>
      <p><span class="glyphicon glyphicon-phone"></span> +63 9178564323</p>
      <p><span class="glyphicon glyphicon-envelope"></span> diveyougo@yahoo.com.ph</p>
    </div>
    <div class="col-sm-7 slideanim">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15517.002870587943!2d120.9674103222386!3d13.520199450511154!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bcf942cab3f4ad%3A0xf0ac4f8ddf2d2fb5!2sSabang+Beach%2C+Puerto+Galera%2C+Oriental+Mindoro!5e0!3m2!1sen!2sph!4v1544443278046"  height="450" frameborder="0" style="border:0" allowfullscreen width="100%"></iframe>
    </div>
  </div>
</div>

<!-- Image of location/map -->


<footer class="container-fluid text-center">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p class="text-center">All Right Reserved @ Jody Lyn Egsoc</p>
</footer>

<script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>

</body>
</html>
