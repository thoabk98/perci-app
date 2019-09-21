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
</head>
<body>
   <!-- header -->
<header>
	<div class="container">
		<!-- nav -->
		<nav class="py-3 d-lg-flex">
			<div id="logo">
				<h1> <a href=""> Peasisoft </a></h1>
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


<!-- banner -->
<div class="banner" id="home">
	<div class="layer">
		<div class="container">
			<div class="banner-text-w3pvt">
				<!-- banner slider-->
				<div class="csslider infinity" id="slider1">
					<input type="radio" name="slides" checked="checked" id="slides_1" />
					<input type="radio" name="slides" id="slides_2" />
					<input type="radio" name="slides" id="slides_3" />
					<ul class="banner_slide_bg">
						<li>
							<div class="w3ls_banner_txt">

								<h3 class="b-w3ltxt text-capitalize mt-md-4">Convert more visitors into revenue</h3>

								<a href="#products" class="btn btn-banner my-sm-3 mr-2">Boost my store !</a>

							</div>
						</li>
					</ul>
				</div>
				<!-- //banner slider-->
			</div>
		</div>
	</div>
</div>
<!-- //banner -->

<!-- about -->
<section class="services py-5" id="values">
	<div class="container py-md-5 py-3">
		<h3 class="heading  mb-5">Our core values</h3>
		<div class="feature-grids row">
			<div class="col-lg-4 col-md-6 col-sm-6 mb-5">
				<div class="bottom-gd">
					<span>01</span>
					<h3 class="mt-4"> Integrity </h3>
					<p class="mt-2">We uphold the highest standards of integrity in all of our actions.</p>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-6 mb-5">
				<div class="bottom-gd">
					<span>02</span>
					<h3 class="mt-4"> Teamwork </h3>
					<p class="mt-2">We work together, across boundaries, to meet the needs of our customers and to help our Company win.</p>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-6 mb-5">
				<div class="bottom-gd">
					<span>03</span>
					<h3 class="mt-4"> Faster </h3>
					<p class="mt-2">Fast is always better than slow.</p>
				</div>
			</div>

			<div class="col-lg-4 col-md-6 col-sm-6 mb-5">
				<div class="bottom-gd">
					<span>04</span>
					<h3 class="mt-4"> Quality </h3>
					<p class="mt-2">We provide outstanding products and unsurpassed service that, together, deliver premium value to our customers.</p>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-6  mb-5">
				<div class="bottom-gd">
					<span>05</span>
					<h3 class="mt-4"> Simplify </h3>
					<p class="mt-2">There is no need to over complicate things.</p>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-6 mb-5">
				<div class="bottom-gd">
					<span>06</span>
					<h3 class="mt-4"> One thing </h3>
					<p class="mt-2">It’s best to do one thing really, really well.</p>
				</div>
			</div>
			</div>
	</div>
</section>
<!-- //about -->

<!-- about us -->
<section class="text py-5" id="about">
	<div class="container py-md-5 py-3 text-center">
		<div class="row">
			<div class="col-12">
				<h2 class="mb-4 heading">ABOUT <span>US</span></h2>
				<p>PEASISOFT started with the simple mission: to help eCommerce entrepreneurs in their online business.
           We’re proud of what we have built so far - and that’s just the start.
        </p>
			</div>
		</div>
	</div>
</section>
<!-- //about us -->

<!-- about bottom -->
<section class="about-bottom py-5" id="products">
	<div class="container py-md-5 py-3">
	<h5 class="heading mb-2">Our products</h5>
		<h3 class="heading mb-sm-5 mb-3">How we help you boost revenue</h3>
		<div class="row">
			<div class="col-lg-8 left-img">
				<img src="{{ asset('landingpage/images/peasi_ult_upsell_1.png') }}" class="img-fluid" alt="" />
			</div>
			<div class="col-lg-4 mt-lg-0 mt-4">
				<div class="row inner-heading">
					<div class="col-md-2">

					</div>
					<div class="col-md-10 text-center">
            <br>
						<h4 class="mt-md-0 mt-2">Peasi Ultimate Upsell</h4>
						<p class="mt-3" >
              Start Earning More Today
              <br>
              With Upsell & Cross-sell
              <br>
              <br>
              Boost your revenue with
              <br>
              Peasi Ultimate Upsell today!
            </p>
						<a class="btn">Getting Started</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- //about bottom -->
<!-- team -->

<!-- //team -->

<!-- portfolio -->

<!-- //Projects -->
<!-- /plans -->

    <!-- //plans -->

<!-- text -->

<!-- //text -->
<!-- testimonials -->
<section class="testi py-5" id="testi">
	<div class="container py-md-5 py-3">
			<h5 class="heading mb-2">We have earn huge faith from our beloved customers!</h5>
		<h3 class="heading mb-sm-5 mb-3">What Our Client Say</h3>
		<div class="row">
			<div class="col-lg-6 mb-4">
				<div class="row testi-cgrid border-right-grid">
					<div class="col-sm-4 testi-icon mb-sm-0 mb-3">
						<img src="{{ asset('landingpage/images/testimonial-1.jpg') }}" alt="" class="img-fluid"/>
					</div>
					<div class="col-sm-8">
						<p class="mx-auto">
              <span class="fa fa-quote-left"></span>
              "Awesome app! Easily customisable and gives great results.
              Contact the support team from within the app for any issues you're having, they're always willing
              to help and very quickly, too. Great team and great apps."
            </p>
						<h6 class="b-w3ltxt mt-3">Johnson - <span>customer</span></h6>
					</div>
				</div>
			</div>
			<div class="col-lg-6 mb-4">
				<div class="row testi-cgrid border-left-grid">
					<div class="col-sm-4 testi-icon mb-sm-0 mb-3">
						<img src="{{ asset('landingpage/images/testimonial-2.jpeg') }}" alt="" class="img-fluid"/>
					</div>
					<div class="col-sm-8">
						<p class="mx-auto">
              <span class="fa fa-quote-left"></span>
              "We have researched thoroughly and found this app. Highly recommend to install this app as it pays
              himself a monthly subscription cost (after trial period is over) within a week so all you are looking
              at is purely positive result."
            </p>
						<h6 class="b-w3ltxt mt-3">Adam - <span>customer</span></h6>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- testimonials -->
<!-- Contact page -->
<section class="contact py-5" id="contact">
	<div class="container py-md-5 py-5">
		<h3 class="heading mb-sm-5 mb-3">CONTACT US</h3>
		<div class="row contact_information">
			<div class="col-md-2 contact_left">
				<div class="contact_border p-4">
				</div>
			</div>
			<div class="col-md-8 mt-4">
				<div class="contact_right p-lg-5 p-4">
					<form action="" method="get">
						<div class="w3_agileits_contact_left">
							<h3 class="mb-3">Contact form</h3>
							<input type="text" name="" placeholder="Your Name" required="">
							<input type="email" name="" placeholder="Your Email" required="">
							<input type="text" name="" placeholder="Phone Number" required="">
							<textarea placeholder="Your Message Here..." required=""></textarea>
						</div>
						<div class="w3_agileits_contact_right">
							<button type="submit" >Submit</button>
						</div>
						<div class="clearfix"> </div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- //Contact page -->

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



</body>
</html>
