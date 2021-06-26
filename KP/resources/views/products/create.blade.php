@extends('layout/index')

@section('title', 'Create Product PT')

@section('content')
    <section class="content">
        <div class="page-heading">
            <h1>Produk</h1>
        </div>
        <div class="page-body clearfix">
            <!-- Input -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Formulir Tambah Produk
                </div>
                <div class="panel-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('products.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Produk : </label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-id-card"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Nama Produk..."
                                            name="nama_produk" value="{{ old('nama_produk') }}">
                                    </div>
                                    <small class="text-danger">{{ $errors->first('nama_produk') }}</small>
                                </div>
                                <div class="form-group">
                                    <label>Stok : </label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-shopping-bag"></i>
                                        </span>
                                        <input type="number" class="form-control" placeholder="Stok..." name="stocks"
                                            value="{{ old('stocks') }}" min="1">
                                    </div>
                                    <small class="text-danger">{{ $errors->first('stocks') }}</small>
                                </div>
                                <div class="form-group">
                                    <label>Nama Pengupload : </label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-id-card"></i>
                                        </span>
                                        <input type="text" class="form-control" readonly value="{{ Auth::User()->name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Foto : </label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="file" class="form-control" placeholder="Foto..." name="foto" id="foto"
                                            value="{{ old('foto') }}">
                                    </div>
                                    <small class="text-danger">{{ $errors->first('foto') }}</small>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi : </label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-briefcase"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Deskripsi..." name="deskripsi"
                                            value="{{ old('deskripsi') }}">
                                    </div>
                                    <small class="text-danger">{{ $errors->first('deskripsi') }}</small>
                                </div>
                                <div class="form-group">
                                    <label>Harga Produk : </label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-credit-card"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="" name="harga_produk"
                                            value="{{ old('harga_produk') }}">
                                    </div>
                                    <small class="text-danger">{{ $errors->first('deskripsi') }}</small>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer" style="padding:10px 0px;">
                            <button type="submit" class="btn btn-sm btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- #END# Input -->
    </section>

@endsection
