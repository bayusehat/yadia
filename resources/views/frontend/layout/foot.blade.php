<!--================ Start footer Area  =================-->
@php
    use App\Config;
    use App\Gallery;

    $config = Config::orderBy('configId','asc')->first();
    $gallery = Gallery::limit(4)->get();

    $office = explode(',',$config->configAddress);
    $phone  = explode(',',$config->configTelephone);
    $email  = explode(',',$config->configEmail);
@endphp	
<footer>
    <div class="footer-area">
        <div class="container">
            <div class="row section_gap">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget tp_widgets">
                        <h4 class="footer_title large_title">Tujuan</h4>
                        {!! $config->configMission !!}
                    </div>
                </div>
                <div class="offset-lg-1 col-lg-2 col-md-6 col-sm-6">
                    <div class="single-footer-widget tp_widgets">
                        <h4 class="footer_title">Pintasan</h4>
                        <ul class="list">
                            <li><a href="{{ url('/') }}">Utama</a></li>
                            <li><a href="{{ url('/program') }}">Program</a></li>
                            <li><a href="{{ url('/galeri') }}">Galeri</a></li>
                            <li><a href="{{ url('/donasi') }}">Donasi</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="single-footer-widget instafeed">
                        <h4 class="footer_title">Gallery</h6>
                        <ul class="list instafeed d-flex flex-wrap">
                           <li><a href="{{ url('/galeri') }}"><i class="fa fa-arrow-right"></i> Lihat semua galeri</a></li>
                        </ul>
                    </div>
                </div>
                <div class="offset-lg-1 col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget tp_widgets">
                        <h4 class="footer_title">Kontak Kami</h4>
                        <div class="ml-40">
                            <p class="sm-head">
                                <span class="fa fa-location-arrow"></span>
                                Kantor
                            </p>
                            <p>{{ $config->configAddress }}</p>
                            <p class="sm-head">
                                <span class="fa fa-phone"></span>
                                Phone Number
                            </p>
                            @for($p = 0;$p < count($phone);$p++)
                                <p>{{ $phone[$p] }} <br></p>
                            @endfor

                            <p class="sm-head">
                                <span class="fa fa-envelope"></span>
                                Email
                            </p>
                            @for($e = 0;$e < count($email);$e++)
                                <p>{{ $email[$e] }} <br></p>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row d-flex">
                <p class="col-lg-12 footer-text text-center">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | yadia.org by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>
        </div>
    </div>
</footer>
<!--================ End footer Area  =================-->
        <script src="{{ asset('assets/js/stellar.js') }}"></script>
        <script src="{{ asset('assets/vendors/lightbox/simpleLightbox.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/nice-select/js/jquery.nice-select.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>
        <script src="{{ asset('assets/js/mail-script.js') }}"></script>
        <script src="{{ asset('assets/js/countdown.js') }}"></script>
        <!--gmaps Js-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
        <script src="{{ asset('assets/js/gmaps.min.js') }}"></script>
        <script src="{{ asset('assets/js/theme.js') }}"></script>
</body>
</html>