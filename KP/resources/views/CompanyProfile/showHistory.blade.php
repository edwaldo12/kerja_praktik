@extends('CompanyProfile/index')

@section('title', 'History Pemesanan')

@section('content')
    <!--====== PAGE TITLE PART START ======-->

    <div class="page-title-area bg_cover" style="background-image: url(resource/assets/images/4.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-content">
                        <h3 class="title">History Pemesanan</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">History</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PAGE TITLE PART ENDS ======-->

    <section class="upcoming-events-area events-page">
        <div class="container">
            @foreach ($order as $pesanan)
                <div class="row">
                    <div class="col-lg-12">
                        <div class="upcoming-events-item">
                            <div class="item mt-20">
                                @if ($pesanan->status == 'Menunggu Pembayaran')
                                    <div style=" position: absolute;right: 30px;top: 30px;">
                                        <a href="{{ route('deleteOrder', ['id' => $pesanan->id]) }}">
                                            <i class="fa fa-times" style="font-size:25px;color:red;"></i>
                                        </a>
                                    </div>
                                @else
                                @endif
                                <div class="row align-items-center">
                                    <div class="col-lg-9">
                                        <div class="upcoming-events-content d-block d-md-flex align-items-center">
                                            <div class="thumb">
                                                <img class="img-thumbnail" width="100"
                                                    style="max-height: 150px;height:100px;"
                                                    src="{{ url('upload_products/' . $pesanan->detailOrders[0]->product->foto) }}"
                                                    alt="Tidak Ada Foto">
                                                <div class="date">
                                                </div>
                                            </div>
                                            <div class="content ml-65">
                                                <ul>
                                                    <li><i class="fa fa-clock-o"></i>
                                                        {{ $pesanan->created_at->isoFormat('dddd, D MMMM Y') }}
                                                    </li>
                                                </ul>
                                                <h4 class="id_order">ID-{{ sprintf('%04d', $pesanan->id) }}</h4>
                                                <h4 class="title">{{ $pesanan->status }}</h4>
                                                <br />
                                                <h6 id="total" style="margin-top: -15px;">Total Harga : Rp .
                                                    {{ number_format($pesanan->total_harga_dibayar, 0, ',', '.') }}
                                                </h6>
                                                <br />
                                                <a href="{{ route('showDetailOrder', ['fk_order' => $pesanan->id]) }}">
                                                    <h6 style="font-weight:normal;">Tampilkan Rincian Pesanan</h6>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($pesanan->status == 'Menunggu Pembayaran')
                                        <div class="col-lg-3">
                                            <div class="events-btn text-left text-lg-right">
                                                <a class="main-btn main-btn-2"
                                                    href="{{ route('viewconfirmation', ['id' => $pesanan->id]) }}">Bayar
                                                    Sekarang</a>
                                            </div>
                                        </div>
                                    @elseif ($pesanan->status == 'Dibatalkan')
                                        <p style="margin-left:60px;font-size:20px;">
                                            Pesanan Dibatalkan
                                        </p>
                                    @else
                                        <div class="col-lg-3">
                                            <div class="events-btn text-left text-lg-right">
                                                <a class="main-btn main-btn-2"
                                                    href="{{ route('viewconfirmation', ['id' => $pesanan->id]) }}"></a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <div class="d-flex justify-content-center" style="margin-bottom: 50px">{{ $order->links() }}</div>

@endsection
