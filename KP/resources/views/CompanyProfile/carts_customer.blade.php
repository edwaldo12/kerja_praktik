@extends('CompanyProfile/index')

@section('title', 'Detail Produk Customer')

@section('content')
    <section class="blog-details" style="margin-top:50px">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="list-cart" id="list-cart">

                        @foreach ($pesanan->detailOrders as $pesananCustomer)
                            <div class="card" style="margin-bottom: 10px">
                                <div class="card-header"
                                    style="background-color:#3f3836;text-align:right;padding:4px 10px 4px 0px">
                                    <button style="border:none;background:none"></button>
                                </div>
                                <div class="card-body" style="display: flex">
                                    <img class="img-thumbnail" width="100" style="height:100px;"
                                        src="{{ url('upload_products/' . $pesananCustomer->product->foto) }}"
                                        alt="Tidak Ada Foto">
                                    <div id="cart-desc" style="padding-left:15px">
                                        <p>Nama Produk : {{ $pesananCustomer->product->nama_produk }}</p>
                                        <p>Jumlah Pesanan : {{ $pesananCustomer->jumlah_pesanan }} Pcs.</p>
                                        <p>Subtotal : Rp. {{ number_format($pesananCustomer->sub_total, 0, ',', '.') }}
                                        </p>

                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div id="total" class="card-body" style="text-align: center">
                            Total Pembayaran : Rp. {{ number_format($pesanan->total_harga_dibayar, 0, ',', '.') }}
                        </div>
                    </div>
                    @if ($pesanan->status == 'Menunggu Pembayaran')
                        <a href="{{ route('viewconfirmation', ['id' => $pesanan->id]) }}">
                            <button type="button"
                                style="margin-top: 5px;padding: 0;display: inline-block;line-height: 50px;width: 370px;height: 50px;text-align: center;background-color: #3CB371"
                                class="btn btn-secondary btn-sm">Checkout</button>
                        </a>
                    @elseif($pesanan->status == 'Menunggu Konfirmasi')
                        <p
                            style="color:white;margin-top: 5px;padding: 0;display: inline-block;line-height: 50px;width: 370px;height: 50px;text-align: center;background-color: #3CB371">
                            Menunggu Konfirmasi Admin</p>
                    @elseif($pesanan->status == 'Sedang Di Proses')
                        <p
                            style="color:white;margin-top: 5px;padding: 0;display: inline-block;line-height: 50px;width: 370px;height: 50px;text-align: center;background-color: #3CB371">
                            Sedang Di Proses</p>
                    @elseif($pesanan->status == 'Mengirim Pesanan')
                        <p
                            style="color:white;margin-top: 5px;padding: 0;display: inline-block;line-height: 50px;width: 370px;height: 50px;text-align: center;background-color: #3CB371">
                            Mengirim Pesanan</p>
                    @elseif($pesanan->status == 'Sedang Di Kirim')
                        <p
                            style="color:white;margin-top: 5px;padding: 0;display: inline-block;line-height: 50px;width: 370px;height: 50px;text-align: center;background-color: #3CB371">
                            Sedang Di Kirim</p>
                    @elseif($pesanan->status == 'Selesai')
                        <p
                            style="color:white;margin-top: 5px;padding: 0;display: inline-block;line-height: 50px;width: 370px;height: 50px;text-align: center;background-color: #3CB371">
                            Pesanan Selesai</p>
                    @elseif($pesanan->status == 'Dibatalkan')
                        <p
                            style="color:white;margin-top: 5px;padding: 0;display: inline-block;line-height: 50px;width: 370px;height: 50px;text-align: center;background-color: #3CB371">
                            Pesanan Dibatalkan</p>
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection
