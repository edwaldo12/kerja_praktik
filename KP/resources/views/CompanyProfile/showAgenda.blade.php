@extends('CompanyProfile/index')

@section('title', 'Agenda Perusahaan')

@section('content')

    <!--====== PAGE TITLE PART START ======-->

    <div class="page-title-area bg_cover" style="background-image: url({{ url('resource/assets/images/4.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-content">
                        <h3 class="title">Agenda</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">News</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PAGE TITLE PART ENDS ======-->

    <!--====== BLOG DETAILS PART ENDS ======-->

    <section class="blog-details">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="blog-details__main">
                        <div class="blog-details__image">
                            <img src="{{ url('upload_agendas/' . $agenda->foto) }}" alt="thumb" width="770px"
                                height="464px">
                        </div><!-- /.blog-details__image -->
                        <div class="blog-details__content">
                            <div class="blog-one__meta">
                                {{-- <a href="#"><i class="fa fa-user-o"></i>Uploaded by admin</a> --}}
                            </div><!-- /.blog-one__meta -->
                            <h3>{{ $agenda->judul }}</h3>
                            <p>{{ $agenda->catatan }}</p>
                        </div><!-- /.blog-details__content -->
                    </div><!-- /.blog-details__main -->
                </div><!-- /.col-lg-8 -->>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.blog-details -->

    <!--====== BLOG DETAILSSTART ======-->
@endsection
