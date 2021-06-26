@extends('CompanyProfile/index')

@section('title', 'Detail Produk')

@section('content')

    <!--====== PAGE TITLE PART START ======-->

    <div class="page-title-area bg_cover" style="background-image: url({{ url('resource/assets/images/4.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-content">
                        <h3 class="title">Detail</h3>
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
                            @csrf
                            <img data-foto="{{ $product->foto }}" src=" {{ url('upload_products/' . $product->foto) }}"
                                alt="Tidak Ada Foto" width="770px" height="464px" id="foto">
                        </div><!-- /.blog-details__image -->
                        <div class="blog-details__content">
                            <div class="blog-one__meta">
                            </div><!-- /.blog-one__meta -->
                            <h3 id="nama_produk">{{ $product->nama_produk }}</h3>
                            <p id="harga_product" data-harga="{{ $product->harga_products }}">Rp.
                                {{ number_format($product->harga_products, 0, ',', '.') }}</p>
                            <p id="deskripsi" style="margin-top:-5px;margin-bottom:-5px;"> Deskripsi :
                                {{ $product->deskripsi }}</p>
                            <div>
                                <p id="stok_product" data-stock="{{ $product->stocks }}"> Jumlah Stok :
                                    {{ $product->stocks }}</p>
                                <div class="form-group">
                                    <label>Jumlah Pesanan : </label>
                                    <div class="input-group col-md-6" style="margin-left: -15px">
                                        <input min="0" max="500" type="number" class="form-control" placeholder=""
                                            name="jumlah_pesanan" value="{{ old('jumlah_pesanan') ?: 0 }}"
                                            id="jumlah_pesanan">
                                    </div>
                                    <small class="text-danger">{{ $errors->first('jumlah_pesanan') }}</small>
                                </div>
                            </div>

                            <div>
                                <p id="total">Subtotal : Rp. 0</p>
                            </div>

                            <div class="panel-footer" style="">
                                <button onclick="addToCart()" class="btn btn-sm btn-success">Tambah ke Keranjang</button>
                            </div>

                        </div><!-- /.blog-details__content -->
                    </div><!-- /.blog-details__main -->
                </div><!-- /.col-lg-8 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.blog-details -->

    <!--====== BLOG DETAILSSTART ======-->
@endsection

@push('scripts')
    <script>
        let total = 0;

        $(function() {
            $("#jumlah_pesanan").on("input", function() {
                total = $(this).val() * $("#harga_product").data('harga');
                $("#total").text("Subtotal : " + formatRupiah(String(total)));
            });

        })

        function addToCart() {
            let stok = $("#stok_product").data('stock');
            let jumlah = parseInt($("#jumlah_pesanan").val());

            if (jumlah <= 0) {
                alert('Pesanan Tidak Boleh Kurang Dari 1');
                return
            }

            if (jumlah > stok) {
                alert('Stok Tidak Mencukupi');
                return
            }

            let token = $("input[name='_token']").val();
            let carts = {
                id: "{{ $product->id }}",
                foto: $("#foto").data('foto'),
                nama_produk: $("#nama_produk").html(),
                harga_produk: $("#harga_product").attr('data-harga'),
                jumlah_pesanan: jumlah,
                total: total,
            };
            $.ajax({
                type: "POST",
                url: "{{ route('cart.add') }}",
                data: {
                    cart: carts,
                    _token: token,
                },
                success: function(result) {
                    if (result.message != undefined) {
                        alert(result.message)
                    } else {
                        alert("Pesanan Berhasil Ditambahkan")
                        window.location.href = "{{ route('product') }}";
                    }
                },
            })
        }
    </script>
@endpush
