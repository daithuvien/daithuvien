<!DOCTYPE html>
<html lang="en">
<head>

	<!-- Basic Page Needs
	================================================== -->
	<title>Đại Thư Viện - Thư Viện Tổng Hợp</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  {!! SEOMeta::generate() !!}
  {!! OpenGraph::generate() !!}
  {!! JsonLd::generate() !!}

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="{{ asset('admin/assets/logos/logo.ico') }}">
	<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('client/images/basketball/favicons/favicon-120.png')}}">
	<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('client/images/basketball/favicons/favicon-152.png')}}">

	<!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">

	<!-- Google Web Fonts
	================================================== -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CSource+Sans+Pro:400,700" rel="stylesheet">

	<!-- CSS
	================================================== -->
	<!-- Vendor CSS -->
	<link href="{{ asset('client/vendor/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
	<link href="{{ asset('client/fonts/font-awesome/css/all.min.css') }}" rel="stylesheet">
	<link href="{{ asset('client/fonts/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet">
	<link href="{{ asset('client/vendor/magnific-popup/dist/magnific-popup.css') }}" rel="stylesheet">
	<link href="{{ asset('client/vendor/slick/slick.css') }}" rel="stylesheet">
	<!-- Template CSS-->
	<link href="{{ asset('client/css/style-basketball-dark.css') }}" rel="stylesheet">
	<!-- Custom CSS-->
	<link href="{{ asset('client/css/custom.css') }}" rel="stylesheet">
</head>

<body>

	<div class="site-wrapper clearfix">
		<div class="site-overlay"></div>
		<!-- Header
		================================================== -->

		<!-- Header Mobile -->
		@include('client.partials.header_mobile')

		<!-- Header Desktop -->
		@include('client.partials.header_desktop')
		<!-- Header / End -->



		@yield('content')


		<!-- Footer
		================================================== -->
		@include('client.partials.footer')
		<!-- Footer / End -->

		<!-- Login/Register Modal -->
		@guest
			@include('client.partials.authmodal')		
		@endguest		
		<!-- Login/Register Modal / End -->

	</div>

	<!-- Javascript Files
	================================================== -->
	<!-- Core JS -->
	<script src="{{ asset('client/vendor/jquery/jquery.min.js')}}"></script>
	<script src="{{ asset('client/vendor/jquery/jquery-migrate.min.js')}}"></script>
	<script src="{{ asset('client/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{ asset('client/js/core.js')}}"></script>

	<!-- Template JS -->
	<script src="{{ asset('client/js/init.js')}}"></script>
	<script src="{{ asset('client/js/custom.js')}}"></script>
</body>
</html>