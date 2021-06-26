@extends('CompanyProfile/index')

@section('title','Home Perusahaan')

@section('content')
    <!--====== PAGE TITLE PART START ======-->
    <div class="page-title-area bg_cover" style="background-image: url(resource/assets/images/4.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-content">
                        <h3 class="title">Contact</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== PAGE TITLE PART ENDS ======-->

    <!--====== CONTACT INFO PART START ======-->
    @if(session('Status'))
    <div class="alert alert-success">
        {{session('Status')}}
    </div>
    @endif
    <section class="contact-info-area">
        <div class="container">
            <div class="contact-info">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="contact-info-content">
                            <h3 class="title">Feel free to get in touch with us PT. Sinar Sanata.</h3>
                            <ul>
                                <li><img src="resource/assets/images/icon/icon-1.png" alt="">Jalan Padang Selasa No.111</li>
                                <li><img src="resource/assets/images/icon/icon-2.png" alt="">sinar-sanata@gmail.com</li>
                                <li><img src="resource/assets/images/icon/icon-3.png" alt=""> 0711357111</li>
                                <li><img src="resource/assets/images/icon/icon-4.png" alt=""> 24 jam / 5 hari kerja</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="contact-info-thumb">
                            <img src="resource/assets/images/9.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="contact-info-text">
                            <p>Anda dapat menghubungi kami dengan waktu jam kerja yang sudah tersedia</p>
                            <p class="text">Tidak puas dengan produk kami ? Anda dapat hubungi nomor layanan yang tersedia kami siap untuk melayani anda </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====== CONTACT INFO PART ENDS ======-->

    <!--====== WRITE MASSAGE PART START ======-->

    <section class="write-massage-area pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="write-massage-content">
                        <div class="write-massage-title text-center">
                            <h3 class="title">Write us message.</h3>
                        </div>
                        <div class="write-massage-input">
                        <form action="{{ route('review.store') }}" method="POST">
                            @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-box mt-10">
                                            <input type="text" placeholder="Name" name="name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box mt-10">
                                            <input type="text" placeholder="Email" name="email">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box mt-10">
                                            <input type="text" placeholder="Phone" name="phone">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box mt-10">
                                            <input type="text" placeholder="Subject" name="subject">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="input-box mt-10 text-center">
                                            <textarea name="message" id="#" cols="30" rows="10" placeholder="Message"></textarea>
                                            <button class="main-btn main-btn-2">Send message</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== WRITE MASSAGE PART ENDS ======-->
        <div class="map-area">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.381783911697!2d104.72956981529784!3d-2.9913797407077003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e3b75f47f39d907%3A0x2431fd0a722ac7c1!2sJl.%20Padang%20Selasa%20No.111%2C%20Bukit%20Lama%2C%20Kec.%20Ilir%20Bar.%20I%2C%20Kota%20Palembang%2C%20Sumatera%20Selatan%2030134!5e0!3m2!1sen!2sid!4v1607194315060!5m2!1sen!2sid"
                width="600"
                height="450"
                frameborder="0"
                style="border:0;"
                allowfullscreen=""
                aria-hidden="false"
                tabindex="0"></iframe>
    </div>

@endsection
