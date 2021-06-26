@extends('CompanyProfile/index')

@section('title', 'Payment')


@section('content')

    <section class="blog-details" style="margin-top:50px">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div id="list-cart">

                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 style="text-align: center;">
                                Instruksi
                                Pembayaran</h4>
                            <hr>
                            <ol>
                                <li>1. Gunakan M-Banking <b>BCA</b> atau <b>ATM BCA</b></li><br />
                                <li>2. Masukkan PIN Anda</li><br />
                                <li>3. Pilih Transfer -> Pilih Antar Rekening</li><br />
                                <li>4. Masukkan rekening 3410343010 A/N Utama Gunawan</li><br />
                                <li>5. Masukkan nominal yang telah tertera pada Total Pembayaran</li><br />
                                <li>6. Selesai</li>
                            </ol>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 style="text-align: center;">
                                Isi Identitas Diri</h5>
                            <hr>
                            <form action="{{ route('cart.paid') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nama Pemesan : </label>
                                    <input type="text" class="form-control" required name="name"
                                        value="{{ session()->get('customer')->name }}" readonly>
                                </div>
                                <div class=" form-group">
                                    <label for="number">Nomor Whatsapp : </label>
                                    <input type="tel" class="form-control" required name="number"
                                        placeholder="Nomor Anda...">
                                </div>
                                <small class="text-danger">{{ $errors->first('number') }}</small>
                                <div class="form-group">
                                    <label for="address">Alamat : </label>
                                    <textarea id="address" name="address" required class="form-control"
                                        placeholder="Alamat Anda..."></textarea>
                                </div>
                                <small class="text-danger">{{ $errors->first('address') }}</small>
                                <button type="submit"
                                    style="margin-top: 5px;padding: 0;display: inline-block;line-height: 50px;width: 100%;height: 50px;text-align: center;background-color: #3CB371"
                                    class="btn btn-secondary btn-sm">Bayar</button>
                                <input type="hidden" id="total_dibayar" name="total">
                            </form>
                            <div id="total" style="text-align: center;font-size: 14pt;font-weight: 500;">
                                Total
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        $(function() {
            let carts = [];

            $.ajax({
                type: "GET",
                url: "{{ url('requestCart') }}/",
                success: function(result) {
                    carts = result.carts;
                    let carts_view = "";
                    for (let i = 0; i < carts.length; i++) {
                        carts_view +=
                            "<div class='card' style='margin-bottom: 10px'>" +
                            "<div class='card-header' style='background-color:#3f3836;text-align:right;padding:4px 10px 4px 0px'>" +
                            "<form action='{{ url('cart') }}/" + carts[i].id + "' method='POST'>" +
                            '@csrf' +
                            '{{ method_field('delete') }}' +
                            "<button style='border:none;background:none'><i class='fa fa-close' style='color:white'></i></button>" +
                            "</form>" +
                            "</div>" +
                            "<div class='card-body' style='display: flex'>" +
                            "<img class='' width='75px' style='height: 75px;border-radius:5px' src='{{ url('upload_products') }}/" +
                            carts[i].foto + "' alt='Tidak Ada Foto'>" +
                            "<div id='cart-desc' style='padding-left:15px'>" +
                            "<a href='' style='font-size:14px;color:#888'>" + carts[i].nama_produk +
                            "</a>" +
                            "<br>" +
                            "<span style='font-size:14px;margin-bottom:5px' id='harga_produk' data-harga='" +
                            carts[i].harga_produk + "'>" + formatRupiah(carts[i].harga_produk) +
                            "</span>" +
                            "<br>" +
                            "<span class='jumlah_pesanan'>" + 'Jumlah : ' + carts[i]
                            .jumlah_pesanan + "</span>" +
                            "<br>" +
                            "</div>" +
                            "</div>" +
                            "</div>";
                    }
                    $('#list-cart').html(carts_view);
                    calculateTotal();
                }
            })

            function calculateTotal() {
                let total = 0;
                let jumlah = 0;
                let harga = 0;
                for (let i = 0; i < carts.length; i++) {
                    total += carts[i].jumlah_pesanan * carts[i].harga_produk;
                }
                $("#total").text("Total : " + formatRupiah(String(total)));
                $("#total_dibayar").val(total);
            }
        });

    </script>

@endsection
