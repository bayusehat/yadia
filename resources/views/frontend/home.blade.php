	<!--================ Home Banner Area =================-->
	<section class="home_banner_area">
		<div class="banner_inner">
			<div class="container">
				<div class="banner_content">
					<p class="upper_text">Ulurkan Tangan</p>
					<h2>Untuk masa depan yang lebih baik</h2>
					<p>
						That don't lights. Blessed land spirit creature divide our made two 
						itself upon you'll dominion waters man second good you they're divided upon winged were replenish night
					</p>
					<a class="primary_btn mr-20" href="#">Donasi Sekarang</a>
					<a class="primary_btn yellow_btn text-white" href="{{ url('/') }}">Program Kami</a>
				</div>
			</div>
		</div>
	</section>
	<!--================ End Home Banner Area =================-->
	
	<!--================ Start Causes Area =================-->
	<section class="causes_area">
		<div class="container">
			<div class="main_title">
				<h2>Tujuan Utama Kami</h2>
				{{-- <p>Creepeth called face upon face yielding midst is after moveth </p> --}}
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-6">
					<div class="single_causes">
						<h4>Menggalang Donasi</h4>
						<img src="{{ asset('assets/img/causes/c1.png') }}" alt="">
						<p>
							It you're. Was called you're fowl grass lesser land together waters beast darkness earth land whose male all moveth fruitful.
						</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="single_causes">
						<h4>Memberikan Inspirasi</h4>
						<img src="{{ asset('assets/img/causes/c2.png') }}" alt="">
						<p>
							It you're. Was called you're fowl grass lesser land together waters beast darkness earth land whose male all moveth fruitful.
						</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="single_causes">
						<h4>Menjadi Donatur</h4>
						<img src="{{ asset('assets/img/causes/c3.png') }}" alt="">
						<p>
							It you're. Was called you're fowl grass lesser land together waters beast darkness earth land whose male all moveth fruitful.
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ End Causes Area =================-->

	<!--================ Start About Us Area =================-->
	<section class="about_area section_gap_bottom">
		<div class="container">
			<div class="row">	
				<div class="single_about row">
					<div class="col-lg-6 col-md-12 text-center about_left">
						<div class="about_thumb">
							<img src="{{ asset('assets/img/hafidz.jpg') }}" class="img-fluid" alt="">
						</div>
					</div>
					<div class="col-lg-6 col-md-12 about_right">
						<div class="about_content">
							<h2>
								<div class="text-center">
									<img src="{{ asset('assets/img/logo YDIA.png') }}" style="width:100px" alt="YADIA Logo">
								</div>
								<hr>
								Tujuan Kami
							</h2>
							{!! $config->configMission !!}<br>
							<a href="{{ url('/galeri') }}" class="primary_btn">Galeri </a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ End About Us Area =================-->

	<!--================ Start Features Cause section =================-->
	<section class="features_causes">
		<div class="container">
			<div class="main_title">
				<h2>Program Kami</h2>
				<p>Menggalang dana untuk saudara - saudara kita yang membutuhkan</p>
			</div>

			<div class="row">
				@foreach ($progutama as $pu)
					<div class="col-lg-4 col-md-6">
						<div class="card">
							<div class="card-body">
								<figure>
									<img class="card-img-top img-fluid" src="{{ asset('program-utama/'.$pu->programUtamaIcon) }}" style="width:360px;height:270px" alt="Card image cap">
								</figure>
								<div class="card_inner_body">
									<h4 class="card-title">{{ $pu->programUtamaTitle }}</h4>
									<p class="card-text">
										{!! $pu->programUtamaContent !!}
									</p>
									<div class="d-flex justify-content-between raised_goal">
										<p>Terkumpul: <br>Rp 200,000</p>
										<p><span>Dibutuhkan: <br>Rp 500,000</span></p>
									</div>
									<div class="d-flex justify-content-between donation align-items-center">
										<a href="#" class="primary_btn">Donasi</a>
										{{-- <p><span class="lnr lnr-heart"></span> 90 Donors</p> --}}
									</div>
								</div>
							</div>
						</div>
					</div>
				@endforeach
				
				{{-- <div class="col-lg-4 col-md-6">
					<div class="card">
						<div class="card-body">
							<figure>
								<img class="card-img-top img-fluid" src="img/features/fc2.jpg" alt="Card image cap">
							</figure>
							<div class="card_inner_body">
								<h4 class="card-title">Feeding the hungry people</h4>
								<p class="card-text">
									Be tree their face won't appear day waters moved fourth in they're divide don't a you were man face god.
								</p>
								<div class="d-flex justify-content-between raised_goal">
									<p>Raised: $1533</p>
									<p><span>Goal: $2500</span></p>
								</div>
								<div class="d-flex justify-content-between donation align-items-center">
									<a href="#" class="primary_btn">donate</a>
									<p><span class="lnr lnr-heart"></span> 90 Donors</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="card">
						<div class="card-body">
							<figure>
								<img class="card-img-top img-fluid" src="img/features/fc3.jpg" alt="Card image cap">
							</figure>
							<div class="card_inner_body">
								<h4 class="card-title">Providing cloth people</h4>
								<p class="card-text">
									Be tree their face won't appear day waters moved fourth in they're divide don't a you were man face god.
								</p>
								<div class="d-flex justify-content-between raised_goal">
									<p>Raised: $1533</p>
									<p><span>Goal: $2500</span></p>
								</div>
								<div class="d-flex justify-content-between donation align-items-center">
									<a href="#" class="primary_btn">donate</a>
									<p><span class="lnr lnr-heart"></span> 90 Donors</p>
								</div>
							</div>
						</div>
					</div>
				</div> --}}
			</div>
		</div>
	</section>
	<!--================ End Features Cause section =================-->

	<!--================ Start Recent Event Area =================-->
	{{-- <section class="event_area section_gap_custom">
		<div class="container">
			<div class="main_title">
				<h2>Upcoming events</h2>
				<p>Creepeth called face upon face yielding midst is after moveth </p>
			</div>
		
			<div class="row">
				<div class="col-lg-6">
					<div class="single_event">
						<div class="row align-items-center">
							<div class="col-lg-6 col-md-6">
								<figure>
									<img class="img-fluid w-100" src="img/event/e1.jpg" alt="">
									<div class="img-overlay"></div>
								</figure>
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="content_wrapper">
									<h3 class="title">
										<a href="event-details.html">Working syrian childreen</a>
									</h3>
									<p>
										Be tree their face won't appear day to waters moved fourth in they're divide don't a you're were man.
									</p>
									<div class="d-flex count_time" id="clockdiv1">
										<div class="mr-25">
											<h4 class="days">552</h4>
											<p>Days</p>
										</div>
										<div class="mr-25">
											<h4 class="hours">08</h4>
											<p>Hours</p>
										</div>
										<div class="mr-25">
											<h4 class="minutes">45</h4>
											<p>Minutes</p>
										</div>
										<div>
											<h4 class="seconds">30</h4>
											<p>Seconds</p>
										</div>
									</div>
									<a href="#" class="primary_btn">Learn More</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-6">
					<div class="single_event">
						<div class="row align-items-center">
							<div class="col-lg-6 col-md-6">
								<figure>
									<img class="img-fluid w-100" src="img/event/e2.jpg" alt="">
									<div class="img-overlay"></div>
								</figure>
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="content_wrapper">
									<h3 class="title">
										<a href="event-details.html">Help and homelesness</a>
									</h3>
									<p>
										Be tree their face won't appear day to waters moved fourth in they're divide don't a you're were man.
									</p>
									<div class="d-flex count_time" id="clockdiv2">
										<div class="mr-25">
											<h4 class="days">552</h4>
											<p>Days</p>
										</div>
										<div class="mr-25">
											<h4 class="hours">08</h4>
											<p>Hours</p>
										</div>
										<div class="mr-25">
											<h4 class="minutes">45</h4>
											<p>Minutes</p>
										</div>
										<div>
											<h4 class="seconds">30</h4>
											<p>Seconds</p>
										</div>
									</div>
									<a href="#" class="primary_btn">Learn More</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-6">
					<div class="single_event">
						<div class="row align-items-center">
							<div class="col-lg-6 col-md-6">
								<figure>
									<img class="img-fluid w-100" src="img/event/e3.jpg" alt="">
									<div class="img-overlay"></div>
								</figure>
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="content_wrapper">
									<h3 class="title">
										<a href="event-details.html">Save the clean water</a>
									</h3>
									<p>
										Be tree their face won't appear day to waters moved fourth in they're divide don't a you're were man.
									</p>
									<div class="d-flex count_time" id="clockdiv3">
										<div class="mr-25">
											<h4 class="days">552</h4>
											<p>Days</p>
										</div>
										<div class="mr-25">
											<h4 class="hours">08</h4>
											<p>Hours</p>
										</div>
										<div class="mr-25">
											<h4 class="minutes">45</h4>
											<p>Minutes</p>
										</div>
										<div>
											<h4 class="seconds">30</h4>
											<p>Seconds</p>
										</div>
									</div>
									<a href="#" class="primary_btn">Learn More</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-6">
					<div class="single_event">
						<div class="row align-items-center">
							<div class="col-lg-6 col-md-6">
								<figure>
									<img class="img-fluid w-100" src="img/event/e4.jpg" alt="">
									<div class="img-overlay"></div>
								</figure>
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="content_wrapper">
									<h3 class="title">
										<a href="event-details.html">Foods for poor childreen</a>
									</h3>
									<p>
										Be tree their face won't appear day to waters moved fourth in they're divide don't a you're were man.
									</p>
									<div class="d-flex count_time" id="clockdiv4">
										<div class="mr-25">
											<h4 class="days">552</h4>
											<p>Days</p>
										</div>
										<div class="mr-25">
											<h4 class="hours">08</h4>
											<p>Hours</p>
										</div>
										<div class="mr-25">
											<h4 class="minutes">45</h4>
											<p>Minutes</p>
										</div>
										<div>
											<h4 class="seconds">30</h4>
											<p>Seconds</p>
										</div>
									</div>
									<a href="#" class="primary_btn">Learn More</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> --}}
	<!--================ End Recent Event Area =================-->

	<!--================Team Area =================-->
	{{-- <section class="team_area section_gap">
		<div class="container">
			<div class="main_title">
				<h2>Meet our voluteer</h2>
				<p>Creepeth called face upon face yielding midst is after moveth </p>
			</div>
			<div class="row team_inner">
				<div class="col-lg-3 col-md-6">
					<div class="team_item">
						<div class="team_img">
							<img class="img-fluid" src="img/voluteer/v1.jpg" alt="">
						</div>
						<div class="team_name">
							<h4>Alea Mirslava</h4>
							<p>Party Manager</p>
							<p class="mt-20">
								So seed seed green that winged cattle in kath  moved us land years living.
							</p>
							<div class="social">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#" class="active"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-instagram"></i></a>
								<a href="#"><i class="fa fa-envelope-o"></i></a>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-3 col-md-6">
					<div class="team_item">
						<div class="team_img">
							<img class="img-fluid" src="img/voluteer/v2.jpg" alt="">
						</div>
						<div class="team_name">
							<h4>Adam Virland</h4>
							<p>Party Manager</p>
							<p class="mt-20">
								So seed seed green that winged cattle in kath  moved us land years living.
							</p>
							<div class="social">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#" class="active"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-instagram"></i></a>
								<a href="#"><i class="fa fa-envelope-o"></i></a>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-3 col-md-6">
					<div class="team_item">
						<div class="team_img">
							<img class="img-fluid" src="img/voluteer/v3.jpg" alt="">
						</div>
						<div class="team_name">
							<h4>Adam Virland</h4>
							<p>Party Manager</p>
							<p class="mt-20">
								So seed seed green that winged cattle in kath  moved us land years living.
							</p>
							<div class="social">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#" class="active"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-instagram"></i></a>
								<a href="#"><i class="fa fa-envelope-o"></i></a>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-3 col-md-6">
					<div class="team_item">
						<div class="team_img">
							<img class="img-fluid" src="img/voluteer/v4.jpg" alt="">
						</div>
						<div class="team_name">
							<h4>Adam Virland</h4>
							<p>Party Manager</p>
							<p class="mt-20">
								So seed seed green that winged cattle in kath  moved us land years living.
							</p>
							<div class="social">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#" class="active"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-instagram"></i></a>
								<a href="#"><i class="fa fa-envelope-o"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> --}}
	<!--================End Team Area =================-->

	<!--================ Start CTA Area =================-->
	<div class="cta-area section_gap overlay">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-7">
					<h1>Menjadi donatur kami</h1>
					<p>
						So seed seed green that winged cattle in. Gathering thing made fly you're 
						divided deep leave on the medicene moved us land years living.
					</p>
					<a href="#" class="primary_btn yellow_btn rounded">Donasi</a>
				</div>
			</div>
		</div>
	</div>
	<!--================ End CTA Area =================-->

	<!--================ Start Story Area =================-->
	<section class="section_gap story_area">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-7">
					<div class="main_title">
						<h2>Berita Terkini</h2>
						<p>
							
						</p>
					</div>
				</div>
			</div>
			<div class="row">
				<!-- single-story -->
				<div class="col-lg-4 col-md-6">
					<div class="single-story">
						<div class="story-thumb">
							<img class="img-fluid" src="{{ asset('assets/img/story/s1.jpg') }}" alt="">
						</div>
						<div class="story-details">
							<div class="story-meta">
								<a href="#">
									<span class="lnr lnr-calendar-full"></span>
									20th Sep, 2018
								</a>
								<a href="#">
									<span class="lnr lnr-book"></span>
									Company
								</a>
							</div>
							<h5>
								<a href="#">
									Lime recalls electric scooters over 
									battery fire.
								</a>
							</h5>
						</div>
					</div>
				</div>

				<!-- single-story -->
				<div class="col-lg-4 col-md-6">
					<div class="single-story">
						<div class="story-thumb">
							<img class="img-fluid" src="{{ asset('assets/img/story/s2.jpg') }}" alt="">
						</div>
						<div class="story-details">
							<div class="story-meta">
								<a href="#">
									<span class="lnr lnr-calendar-full"></span>
									20th Sep, 2018
								</a>
								<a href="#">
									<span class="lnr lnr-book"></span>
									Company
								</a>
							</div>
							<h5>
								<a href="#">
									Apple resorts to promo deals 
									trade to boost 
								</a>
							</h5>
						</div>
					</div>
				</div>

				<!-- single-story -->
				<div class="col-lg-4 col-md-6">
					<div class="single-story">
						<div class="story-thumb">
							<img class="img-fluid" src="{{ asset('assets/img/story/s3.jpg') }}" alt="">
						</div>
						<div class="story-details">
							<div class="story-meta">
								<a href="#">
									<span class="lnr lnr-calendar-full"></span>
									20th Sep, 2018
								</a>
								<a href="#">
									<span class="lnr lnr-book"></span>
									Company
								</a>
							</div>
							<h5>
								<a href="#">
									Lime recalls electric scooters over 
									battery fire.
								</a>
							</h5>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ End Story Area =================-->

	<!--================ Start Subscribe Area =================-->
	<div class="container">
		<div class="subscribe_area">
			<div class="row">
				<div class="col-lg-12">
					<div class="d-flex align-items-center">
						<h1 class="text-white">Ikuti berita terbaru kami</h1>
						<div id="mc_embed_signup">
							<form target="_blank" action="" method="post" class="subscribe_form relative">
								<div class="input-group d-flex flex-row">
									<input name="emailSubscribe" placeholder="E-mail anda" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '" required="" type="email">
									<button class="ml-10 primary_btn yellow_btn btn sub-btn rounded">IKUTI</button>		
								</div>									
								<div class="info"></div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--================ End Subscribe Area =================-->