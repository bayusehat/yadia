 <!--================ Home Banner Area =================-->
 <section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <h2>{{ $title }}</h2>
                <p>Donasi untuk kegiatan Yayasan Dakwah Islam</p>
            </div>
        </div>
    </div>
</section>
<!--================ End Home Banner Area =================-->

<!--================ Start About Us Area =================-->
<section class="donasi_area section_gap">
    <div class="container">
        <div class="row">	
            {{-- <div class="single_about row"> --}}
                {{-- <div class="col-lg-6 col-md-12 text-center about_left">
                    <div class="about_thumb">
                        <img src="img/about-img.jpg" class="img-fluid" alt="">
                    </div>
                </div> --}}
                <div class="col-lg-12 col-md-12 col-sm-12 donasi_right">
                    <div class="about_content text-center">
                        <h4>
                            Donasi terkumpul saat ini : 
                        </h4>
                        <h1 style="font-size:100px">
                            Rp {{ number_format($totalDonasi[0]->value)}}
                        </h1>
                        <hr>
                        <p class="text-danger"><i>Terakhir diperbarui pada {{ date('d F Y, H:i', strtotime($donasi->donasiUpdate)) }}</i></p>
                    </div>
                </div>
            {{-- </div> --}}
        </div>
    </div>
</section>
<!--================ End About Us Area =================-->

<!--================Team Area =================-->
<section class="team_area section_gap">
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
</section>
<!--================End Team Area =================-->

<!--================ Start CTA Area =================-->
<div class="cta-area section_gap overlay">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <h1>Become a volunteer</h1>
                <p>
                    So seed seed green that winged cattle in. Gathering thing made fly you're 
                    divided deep leave on the medicene moved us land years living.
                </p>
                <a href="#" class="primary_btn yellow_btn rounded">join with us</a>
            </div>
        </div>
    </div>
</div>
<!--================ End CTA Area =================-->
    