@extends('CompanyProfile/index')

@section('title', 'Konfirmasi Pembayaran')

@section('content')

    <!--====== PAGE TITLE PART START ======-->

    <div class="blog-details">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="page-title-content">
                                <h3 class="title" style="text-align: center">Konfirmasi Pembayaran</h3><br />
                            </div>
                            <h4>ID Transaksi : ID-{{ sprintf('%04d', $order->id) }}</h4>
                            <hr />
                            <div class="col-md-12">
                                <p style="text-align: center">Harap untuk upload foto untuk di verifikasi pembayaran anda
                                </p>
                                <p style="text-align: center" class="countdown">Batas Waktu Pengiriman :
                                    {{ date('Y-m-d H:i:s', strtotime($order->created_at . ' +1 day')) }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('payment.upload', ['id' => $id]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <a href="{{ route('home') }}"><button type="button" class="btn btn-sm btn-secondary"
                                        style="padding: 10px;">Bayar Nanti</button>
                                </a>
                            </div>
                            <div class="col-6 text-right">
                                <input type="file" class="btn btn-sm btn-secondary" style="padding: 7px;" name="upload_file"
                                    id="upload_file" value="{{ old('foto') }}">
                                <button type="submit" class="btn btn-sm btn-success" style="padding: 10px;">Upload</button>
                            </div>
                        </div>
                        <small class="text-danger">{{ $errors->first('upload_file') }}</small>
                    </form>
                </div>
            </div>


        </div>
    </div>

    <!--====== PAGE TITLE PART ENDS ======-->

    <!--====== BLOG DETAILS PART ENDS ======-->

    <section class="blog-details">
        <div class="container">

        </div><!-- /.container -->
    </section><!-- /.blog-details -->

    <!--====== BLOG DETAILSSTART ======-->
@endsection

<script>
    @if (!empty($errors->first('upload_file')))
        alert("{{ $errors->first('upload_file') }}")
    @endif
</script>
