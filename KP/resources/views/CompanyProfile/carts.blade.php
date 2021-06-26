@extends('CompanyProfile/index')

@section('title', 'Detail Produk')

@section('content')
    @php
    $i = 1;
    @endphp
    <section class="blog-details" style="margin-top:50px">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="list-cart" id="list-cart">

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div id="total" class="card-body" style="text-align: center">
                            Total Pembayaran
                        </div>
                    </div>
                    <a href="{{ route('cart.checkout') }}">
                        <button type="button"
                            style="margin-top: 5px;padding: 0;display: inline-block;line-height: 50px;width: 370px;height: 50px;text-align: center;background-color: #3CB371"
                            class="btn btn-secondary btn-sm">Checkout</button>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <script>
        let carts = [];
        carts = JSON.parse('{!! $carts !!}')
        // let timeout;

        // function test() {
        //     clearTimeout(timeout);
        //     timeout = setTimeout(function() {

        //     }, 1500)
        // }
        $(function() {
            refreshCart()

            function refreshCart() {
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
                        "<a href='' style='font-size:14px;color:#888'>" + carts[i].nama_produk + "</a>" +
                        "<br>" +
                        "<span style='font-size:14px;margin-bottom:5px' id='harga_produk' data-harga='" +
                        carts[i].harga_produk + "'> " + formatRupiah(carts[i].harga_produk) + "</span>" +
                        "<br>" +
                        "<span>" +
                        "<button class='kurang' data-id='" + carts[i].id +
                        "' style='font-weight:bold;color:#de392a;border:2.5px solid #de392a;background:none;width:25px;height:25px;border-radius:100%'>-</button>" +
                        "<span class='jumlah_pesanan' style='margin:0px 15px 0px 15px'>" + carts[i]
                        .jumlah_pesanan + "</span>" +
                        "<button class='tambah' data-id='" + carts[i].id +
                        "' style='font-weight:bold;color:#de392a;border:2.5px solid #de392a;background:none;width:25px;height:25px;border-radius:100%'>+</button>" +
                        "</span>" +
                        "<br>" +
                        "</div>" +
                        "</div>" +
                        "</div>";
                }
                $('#list-cart').html(carts_view);
                calculateTotal();
            }

            let timeoutKurang;
            $(".kurang").on('click', function() {
                clearTimeout(timeoutKurang);
                const id = $(this).data('id')
                for (let i = 0; i < carts.length; i++) {
                    if (carts[i].id == id) {
                        carts[i].jumlah_pesanan--;
                        $(this).prop("disabled", carts[i].jumlah_pesanan == 1);
                        $(this).next().next().prop("disabled", carts[i].jumlah_pesanan == 500);
                        $(this).next().text(carts[i].jumlah_pesanan);
                    }
                }
                timeoutKurang = setTimeout(() => {
                    $.ajax({
                        type: "GET",
                        url: "{{ url('cartMin') }}/" + id + "/" + $(this).next().text()
                    })
                    calculateTotal();
                }, 750)
            });

            let timeoutTambah;
            $(".tambah").on('click', function() {
                clearTimeout(timeoutTambah);
                const id = $(this).data('id')
                for (let i = 0; i < carts.length; i++) {
                    if (carts[i].id == id) {
                        carts[i].jumlah_pesanan++;
                        console.log(carts)
                        if (carts[i].jumlah_pesanan > carts[i].stocks) {
                            alert('Pesanan Tidak Bisa Lebih Dari Stok');
                            return
                        }
                        $(this).prop("disabled", carts[i].jumlah_pesanan == 1);
                        $(this).prev().prev().prop("disabled", carts[i].jumlah_pesanan == 500);
                        $(this).prev().text(carts[i].jumlah_pesanan);
                    }
                }

                timeoutTambah = setTimeout(() => {
                    $.ajax({
                        type: "GET",
                        url: "{{ url('cartPlus') }}/" + id + "/" + $(this).prev().text()
                    })
                    calculateTotal();
                }, 750)
            });

            function calculateTotal() {
                let total = 0;
                for (let i = 0; i < carts.length; i++) {
                    total += carts[i].jumlah_pesanan * carts[i].harga_produk;
                }
                $("#total").text("Total Harga  : " + formatRupiah(String(total)));
            }
            calculateTotal()
        });
    </script>

@endsection
