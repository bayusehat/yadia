<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <h2>{{ $title }}</h2>
                <p>Platea nullam nostra laoreet potenti hendrerit laoreet enim nisl</p>
            </div>
        </div>
    </div>
</section>

<section class="mb-3">
    <div class="container">
        <div class="row-gallery">
            @foreach ($gallery as $g)
                <div class="col-md-3 col-sm-12 col-xl-3 column">
                    <div class="container-image">
                        <img class="image" src="{{ asset('gallery/'.$g->galleryfile) }}" alt="{{ $g->galleryTitle }}">
                        <div class="overlay">{{ $g->galleryTitle }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>