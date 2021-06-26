@extends('CompanyProfile/index')

@section('title', 'Home Perusahaan')

@section('content')
    <!--====== BANNER PART START ======-->
    <section class="banner-slide">
        <div class="banner-area bg_cover d-flex align-items-center"
            style="background-image: url({{ url('resource/assets/images/4.jpg') }});">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-slide-number">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-7">
                        <div class="banner-content">
                            <span data-animation="fadeInDown" data-delay=".1s" style="color:rgb(255, 255, 255)"><img
                                    src="{{ url('resource/assets/images/banner-icon.png') }}" alt=""> Welcome to
                                PT. Sinar Sanata</span>
                            <h1 data-animation="fadeInLeft" style="color:rgb(255, 255, 255)" data-delay=".5s" class="title">
                                We
                                make the bulbs worth it price.</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (session('Status'))
            <div class="alert alert-success">
                {{ session('Status') }}
            </div>
        @endif
        <div class="banner-area bg_cover d-flex align-items-center"
            style="background-image: url('{{ url('resource/assets/images/20.jpg') }}');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-slide-number">
                            <span style="color:rgb(255, 115, 0)">02</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-7">
                        <div class="banner-content">
                            <span data-animation="fadeInDown" data-delay=".1s" style="color:rgb(255, 255, 255)"><img
                                    src="{{ url('resource/assets/images/banner-icon.png') }}" alt=""> Welcome to
                                PT. Sinar Sanata</span>
                            <h1 data-animation="fadeInLeft" data-delay=".5s" style="color:rgb(255, 255, 255)" class="title">
                                every bulbs that we made is the best product</h1>
                            <!-- <a data-animation="fadeInLeft" data-delay="1s" class="main-btn" href="book-a-tour.html">Book a tour</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====== BANNER PART ENDS ======-->

    <!--====== BEST CREATIVE PART START ======-->

    <section class="best-creative-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="best-creative-bg">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="best-creative-content">
                                    <h3 class="title">Tentang kami</h3>
                                    <p>kami adalah perusahaan yang menjual bola lampu motor,mobil,rumah dan berbagai
                                        kebutuhan bola lampu lainnya.</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====== BEST CREATIVE PART ENDS ======-->

    <!--====== SPACE TO MAKE PART START ======-->

    <section class="space-to-make-area pt-120 pb-120">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="space-to-make-thumb animated wow fadeInLeft" data-wow-duration="1500ms"
                        data-wow-delay="0ms">
                        <img src="{{ url('resource/assets/images/17.jpg') }}" alt="">
                        <div class="thumb-content">
                            <span>Over 10 <br> locations <br> in Sumatera Selatan</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-10">
                    <div class="space-to-make-content">
                        <h3 class="title">Kami Adalah PT. Sinar Sanata Electronic Industry.</h3>
                        <p>Perusahaan kami mempunyai banyak produk dari bola lampu mobil,motor,dan untuk kegiatan indoor dan
                            outdoor seperti acara di lapangan dan kami melayani pengiriman sampai dengan Se-Indonesia.</p>
                        <div class="row">
                        </div>
                        <p class="text">Jika anda ingin memesan bola lampu dari perusahaan kami maka anda dapat menghubungi
                            CP yang tertera di halaman contact-us atau email ke pihak kami.</p>
                        <!-- <a class="main-btn main-btn-2" href="book-a-tour.html">Book a tour</a> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="shape-pattern">
            <img src="{{ url('resource/assets/images/shape-pattern.png') }}" alt="">
        </div>
        <div class=" shape-pattern-2">
            <img src="{{ url('resource/assets/images/we-know-line.png') }}" alt="">
        </div>
    </section>

    <!--====== SPACE TO MAKE PART ENDS ======-->

    <!--====== TEUSTED PART START ======-->

    <div class="trusted-area bg_cover pt-120 pb-120" style="background-image: url(resource/assets/images/20.jpg);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="trusted-item text-center">
                        <h3 class="title">Trusted & comfortable space for creative people.</h3>
                        <!-- <a class="main-btn" href="book-a-tour.html">Book a tour</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== TEUSTED PART ENDS ======-->

    <!--====== BENEFITS PART START ======-->

    <section class="benefits-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="benefits-thumb">
                        <img src="{{ url('resource/assets/images/9.jpg') }}" alt="benefits">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="benefits-content">
                        <div class="benefits-title">
                            <h3 class="title">Keuntungan membeli bola lampu di perusahaan kami !</h3>
                        </div>
                        <div class="faq-accordion">
                            <div class="accrodion-grp" data-grp-name="faq-accrodion">
                                <div class="accrodion active  animated wow fadeInRight" data-wow-duration="1500ms"
                                    data-wow-delay="0ms">
                                    <div class="accrodion-inner">
                                        <div class="accrodion-title">
                                            <h4>1. Pelayanan yang cepat</h4>
                                        </div>
                                        <div class="accrodion-content">
                                            <div class="inner">
                                                <p>Dengan membeli bola lampu di perusahaan kami , pihak kami akan memproses
                                                    langsung disaat customer melakukan pesanan.</p>
                                            </div><!-- /.inner -->
                                        </div>
                                    </div><!-- /.accrodion-inner -->
                                </div>
                                <div class="accrodion   animated wow fadeInRight" data-wow-duration="1500ms"
                                    data-wow-delay="300ms">
                                    <div class="accrodion-inner">
                                        <div class="accrodion-title">
                                            <h4>2. Asuransi Pengembalian</h4>
                                        </div>
                                        <div class="accrodion-content">
                                            <div class="inner">
                                                <p>Dengan membeli bola lampu di perusahaan kami, pihak yang membeli akan
                                                    mendapatkan asuransi untuk bola lampu yang rusak s&k berlaku.</p>
                                            </div><!-- /.inner -->
                                        </div>
                                    </div><!-- /.accrodion-inner -->
                                </div>
                                <div class="accrodion  animated wow fadeInRight" data-wow-duration="1500ms"
                                    data-wow-delay="600ms">
                                    <div class="accrodion-inner">
                                        <div class="accrodion-title">
                                            <h4>3. Produk yang terjamin kualitas nya</h4>
                                        </div>
                                        <div class="accrodion-content">
                                            <div class="inner">
                                                <p>Produk yang kami jual terjamin kualitas nya untuk setiap barang yang kami
                                                    jual.</p>
                                            </div><!-- /.inner -->
                                        </div>
                                    </div><!-- /.accrodion-inner -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="benefits-pattern">
            <img src="{{ url('resource/assets/images/benefits-pattern.png') }}" alt="">
        </div>
        <div class="benefits-dot">
            <img src="{{ url('resource/assets/images/benefits-dot.png') }}" alt="">
        </div>
    </section>

    <!--====== BENEFITS PART ENDS ======-->

    <!--====== SERVICES PART START ======-->

    <section class="services-area pt-90 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="services-title">
                        <h3 class="title">Apa yang kami tawarkan kepada customer.</h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-services mt-30">
                        <i class="flaticon-wifi"></i>
                        <h4 class="title">Layanan yang cepat</h4>
                        <p>Karyawan kami siap menjawab panggilan yang anda lakukan.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-services mt-30">
                        <i class="flaticon-tray"></i>
                        <h4 class="title">Pengantaran lampu cepat</h4>
                        <p>kami langsung memproses order dari customer</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-services mt-30">
                        <i class="flaticon-room"></i>
                        <h4 class="title">Jaringan terpercaya</h4>
                        <p>Perusahaan kami beroperasi selama 30 tahun se-sumatera</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="services-book mt-30">
                        <h3 class="title">We are very trustworthy company</h3>
                        <!-- <a class="main-btn main-btn-2" href="book-a-tour.html">Book a tour</a> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="services-pattern">
            <img src="{{ url('resource/assets/images/services-pattern.png') }}" alt="pattern">
        </div>
        <div class="services-dot">
            <img src="{{ url('resource/assets/images/services-dot.png') }}" alt="pattern">
        </div>
    </section>

    <!--====== SERVICES PART ENDS ======-->

    <!--====== GALLERY PART START ======-->

    <section class="gallery-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="gallery-title text-center">
                        <h3 class="title">Our Product Gallery</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid p-0">
            <div class="gallery-itmes">
                <div class="row no-gutters gallery-active">
                    @foreach ($products as $product)
                        <div class="col-lg-3">
                            <div class="gallery-thumb">
                                <img src="{{ url('upload_products/' . $product->foto) }}" alt="gallery"
                                    style="max-width: 400px;max-height:400px;min-height:400px">
                                <a class="main-btn image-popup" href="{{ url('upload_products/' . $product->foto) }}"><i
                                        class="flaticon-plus"></i></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!--====== GALLERY PART ENDS ======-->

    <!--====== FUN FACTS PART START ======-->

    <div class="fun-facts-area pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-12">
                    <div class="fun-facts-item text-center animated wow fadeInUp" data-wow-duration="5000ms"
                        data-wow-delay="0ms">
                        <h3 class="title counter">{{ $total_produk }}</h3>
                        <span>Jumlah Produk.</span>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="fun-facts-item active text-center animated wow fadeInUp " data-wow-duration="5000ms"
                        data-wow-delay="0ms">
                        <h3 class="title counter">{{ $total_order }}</h3>
                        <span>Produk Terjual.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="fun-facts-pattern">
            <img src="{{ url('resource/assets/images/fun-facts-pattern.png') }}" alt="">
        </div>
        <div class="fun-dots">
            <img src="{{ url('resource/assets/images/fun-dots.png') }}" alt="dots">
        </div>
    </div>


    <section class="codesk-changing-area bg_cover" style="background-image: url('foto_company_profile/foto_lampu.jpg');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="codesk-changing-text">
                        <h3 class="title">PT.Sinar Sanata memberikan pengalaman bola lampu terbaik</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
