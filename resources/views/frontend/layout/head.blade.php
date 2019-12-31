<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="img/favicon.png" type="image/png">
        <title>Yadia | {{ $data['title'] }}</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/linericon/style.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/lightbox/simpleLightbox.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/nice-select/css/nice-select.css') }}">
        <!-- main css -->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
         
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ asset('assets/js/popper.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    </head>
<body>
        
	<!--================ Start Header Menu Area =================-->
	<header class="header_area">
		<div class="main_menu">
			<div class="container">
				<nav class="navbar navbar-expand-lg navbar-light">
					<div class="container">
						<!-- Brand and toggle get grouped for better mobile display -->
						<a class="navbar-brand logo_h" href="index.html"><img src="{{ asset('assets/img/logo.png') }}" alt=""></a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
							<ul class="nav navbar-nav menu_nav ml-auto">
								<li class="nav-item @if($data['url'] == 'home') {{ 'active' }} @else {{ '' }} @endif"><a class="nav-link" href="{{ url('/') }}">Utama</a></li> 
                                <li class="nav-item submenu dropdown @if($data['url'] == 'profil') {{ 'active' }} @else {{ '' }} @endif">
									<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profil</a>
									<ul class="dropdown-menu">
										<li class="nav-item"><a class="nav-link" href="{{ url('/profil') }}">Visi Misi</a>
										<li class="nav-item"><a class="nav-link" href="event-details.html">Event Details</a>
										<li class="nav-item"><a class="nav-link" href="{{ url('/kontak') }}">Kontak</a></li>
									</ul>
                                </li>  
								{{-- <li class="nav-item"><a class="nav-link" href="causes.html">Program</a> --}}
								<li class="nav-item submenu dropdown @if($data['url'] == 'program') {{ 'active' }} @else {{ '' }} @endif">
									<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Program</a>
									<ul class="dropdown-menu">
										<li class="nav-item"><a class="nav-link" href="{{ url('/program') }}">Wakaf Tanahs</a>
										<li class="nav-item"><a class="nav-link" href="event-details.html">Event Details</a>
										<li class="nav-item"><a class="nav-link" href="elements.html">Elements</a></li>
									</ul>
                                </li> 
                                <li class="nav-item @if($data['url'] == 'gallery') {{ 'active' }} @else {{ '' }} @endif"><a class="nav-link" href="{{ url('/gallery') }}">Gallery</a></li>
								<li class="nav-item @if($data['url'] == 'laporan') {{ 'active' }} @else {{ '' }} @endif">
									<a href="{{ url('/laporan') }}" class="nav-link">Laporan Keuangan</a>
								</li> 
							</ul>
						</div> 
					</div>
				</nav>
			</div>
		</div>
	</header>