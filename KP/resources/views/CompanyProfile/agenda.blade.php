@extends('CompanyProfile/index')

@section('title', 'Agenda Perusahaan')

@section('content')
    <!--====== PAGE TITLE PART START ======-->

    <div class="page-title-area bg_cover" style="background-image: url(resource/assets/images/4.jpg);">
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

    <!--====== NEWS 2 PART START ======-->

    <section class="news-2-area news-page">
        <div class="container">
            <div class="row justify-content-center">
                @foreach ($agendas as $agenda)
                    <div class="col-lg-4 col-md-7 col-sm-9">
                        <div class="news-item mt-30">
                            <div class="news-thumb">
                                <img src="{{ url('upload_agendas/' . $agenda->foto) }}" alt="Tidak Ada Foto" width="370px"
                                    height="470px">
                            </div>
                            <div class="news-content">
                                <ul>
                                    {{-- <li><i class="fa fa-user-o"></i> Uploaded by {{ $agenda->username }}</li> --}}
                                </ul>
                                <h3 class="title">{{ $agenda->judul }}</h3>
                                <a href="{{ route('showAgenda', ['id' => $agenda->id]) }}"><i
                                        class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <div class="d-flex justify-content-center" style="margin-bottom: 50px">{{ $agendas->links() }}</div>

@endsection
