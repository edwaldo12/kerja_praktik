@extends('CompanyProfile/index')

@section('title','Tentang Perusahaan')

@section('content')

    <!--====== PAGE TITLE PART START ======-->

    <div class="page-title-area bg_cover" style="background-image: url(resource/assets/images/4.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-content">
                        <h3 class="title">About</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">About</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="get-to-know-area">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-6">
                    <div class="get-to-know-content">
                        <h3 class="title">Tentang kami, PT. Sinar Sanata dapat melayani anda</h3>
                        <p>Perusahaan kami mempunyai banyak produk dari bola lampu mobil,motor,dan untuk kegiatan indoor dan outdoor seperti acara di lapangan dan kami melayani pengiriman sampai dengan Se-Indonesia.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="about-pattern">
            <img src="resource/assets/images/shape-pattern.png" alt="">
        </div>
    </section>

    <section class="join-community-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="join-community-content">
                        <h3 class="title animated wow fadeInLeft" data-wow-duration="1500ms" data-wow-delay="0ms">Kenali kami PT. Sinar Sanata</h3>
                        <p class=" animated wow fadeInLeft" data-wow-duration="1500ms" data-wow-delay="300ms">kami adalah perusahaan yang menjual bola lampu motor,mobil,rumah dan berbagai kebutuhan bola lampu lainnya. Jika anda ingin memesan bola lampu dari perusahaan kami maka anda dapat menghubungi CP yang tertera di halaman contact-us atau email ke pihak kami.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="community-logo">
            <img src="resource/assets/images/community-logo.png" alt="">
        </div>
    </section>

    <!--====== JOIN COMMUNITY PART ENDS ======-->

 @endsection
