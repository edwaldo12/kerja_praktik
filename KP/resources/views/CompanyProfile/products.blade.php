@extends('CompanyProfile/index')

@section('title', 'Tentang Perusahaan')

@section('content')

    <!--====== PAGE TITLE PART START ======-->

    <div class="page-title-area bg_cover" style="background-image: url(resource/assets/images/10.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-content">
                        <h3 class="title">Product</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Product</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PAGE TITLE PART ENDS ======-->

    <!--====== GALLERY PART START ======-->

    <div class="gallery-area gallery-page">
        <div class="container">
            <div class="gallery-itmes">
                <div class="row">
                    @foreach ($products as $produk)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="gallery-thumb mt-30">
                                <img src="{{ url('upload_products/' . $produk->foto) }}" alt="Tidak Ada Produk"
                                    width="370px" height="470px">
                                <a class="main-btn" href="{{ route('product.details', ['id' => $produk->id]) }}"><i
                                        class="">Detail</i></a>
                                <p style="text-align: center;font-family: 'Poppins Light';font-style: italic">
                                    {{ $produk->nama_produk }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center" style="margin-bottom: 50px">{{ $products->links() }}</div>


@endsection
