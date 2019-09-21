<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html lang="zxx">

<head>
  <title>Peasisoft</title>
  <!-- Meta tag Keywords -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="UTF-8" />
  <meta name="keywords" content="Promote Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
  <!-- //Meta tag Keywords -->

  <!-- Custom-Files -->
  <link rel="stylesheet" href="{{ asset('landingpage/css/bootstrap.css') }}">
  <!-- Bootstrap-Core-CSS -->
  <link rel="stylesheet" href="{{ asset('landingpage/css/style.css') }}" type="text/css" media="all" />
  <link rel="stylesheet" href="{{ asset('landingpage/css/slider.css') }}" type="text/css" media="all" />
  <!-- Style-CSS -->
  <!-- font-awesome-icons -->
  <link href="{{ asset('landingpage/css/font-awesome.css') }}" rel="stylesheet">
  <!-- //font-awesome-icons -->
  <!-- /Fonts -->
  <link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
  <!-- //Fonts -->

  @yield('header')

</head>
<body>
   <!-- header -->
  <header class="bg-dark position-relative">
    <div class="container">
      <!-- nav -->
      <nav class="py-3 d-lg-flex">
        <div id="logo">
          <h1> <a href="{{ route('landingpage.index') }}"> Peasisoft </a></h1>
        </div>
        <label for="drop" class="toggle"><span class="fa fa-bars"></span></label>
        <input type="checkbox" id="drop" />
        <ul class="menu ml-auto mt-1">
          <li class="active"><a href="{{ route('landingpage.index') }}">Home</a></li>
          <li class=""><a href="{{ route('landingpage.index') }}#about">About Us</a></li>
          <li class=""><a href="{{ route('landingpage.index') }}#products">Products</a></li>
          <li class=""><a href="{{ route('landingpage.faq') }}">FAQ</a></li>
          <li class=""><a href="{{ route('landingpage.index') }}#contact">Contact</a></li>
        </ul>
      </nav>
      <!-- //nav -->
    </div>
  </header>
  <!-- //header -->


  <!-- content -->
  @yield('content')
  <!-- //content -->

  <!-- footer -->
  <footer class="py-md-5 py-3">
    <div class="container py-md-5 py-3">
      <div class="row footer-grids">
        <div class="col-lg-4 col-sm-6 mb-md-0 mb-sm-5 mb-4">
          <h4 class="mb-4">Address Info</h4>
          <p><span class="fa mr-2 fa-map-marker"></span>Hanoi, <span>Vietnam.</span></p>
          <p><span class="fa mr-2 fa-envelope"></span><a href="mailto:info@example.com">info@peasisoft.com</a></p>
        </div>
        <div class="col-lg-4 col-sm-6 mb-lg-0 mb-sm-5 mb-4">
          <h4 class="mb-4">Terms</h4>
          <ul>
            <li class="mt-2"><a href="{{ route('landingpage.termOfService') }}">Term of service</a></li>
            <li class="mt-2"><a href="{{ route('landingpage.privacyPolicy') }}">Privacy Policy</a></li>
          </ul>
        </div>
        <div class="col-lg-3 col-sm-6">
          <p class="mb-3">Partner of BigCommerce</p>
          <a href="https://www.bigcommerce.com" target="_blank">
            <img src="{{ asset('landingpage/images/BigCommerce-logo-dark.png') }}" class="img-fluid" alt="" />
          </a>
        </div>
      </div>
    </div>
  </footer>
  <!-- //footer -->

  <!-- copyright -->
  <div class="copyright">
    <div class="container py-4">
      <div class=" text-center">
        <p>© 2019 promote. All Rights Reserved | Design by <a href="http://w3layouts.com/"> W3layouts</a> </p>
      </div>
    </div>
  </div>
  <!-- //copyright -->

  <!-- move top -->
  <div class="move-top text-right">
    <a href="#home" class="move-top">
      <span class="fa fa-angle-up  mb-3" aria-hidden="true"></span>
    </a>
  </div>
  <!-- move top -->

  @yield('script')
</body>
</html>
