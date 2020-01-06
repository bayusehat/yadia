<!--================ Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <h2>Program & Kegiatan</h2>
                <p>Platea nullam nostra laoreet potenti hendrerit laoreet enim nisl</p>
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