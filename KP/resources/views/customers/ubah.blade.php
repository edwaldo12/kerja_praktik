@extends('layout/index')

@section('title', 'Ubah Pelanggan')

@section('content')
    <section class="content">
        <div class="page-heading">
            <h1>Pelanggan</h1>
        </div>
        <div class="page-body clearfix">
            <!-- Input -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Formulir Pengubahan Pelanggan
                </div>
                <div class="panel-body">
                    <form method="POST" enctype="multipart/form-data"
                        action="{{ route('ubah.pelanggan', ['customer' => $customer->id]) }}">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Pelanggan : </label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-id-card"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Nama anda" name="name"
                                            value="{{ old('name') ? old('name') : $customer->name }}">
                                    </div>
                                    <small class="text-danger">{{ $errors->first('name') }}</small>
                                </div>
                                <div class="form-group">
                                    <label>Username : </label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-shopping-bag"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Nama user" name="username"
                                            value="{{ old('username') ? old('username') : $customer->username }}">
                                    </div>
                                    <small class=" text-danger">{{ $errors->first('username') }}</small>
                                </div>
                                <div class="form-group">
                                    <label>Password : </label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-id-card"></i>
                                        </span>
                                        <input type="password" class="form-control" name="password"
                                            value="{{ old('password') }}">
                                    </div>
                                    <small class="text-danger">Kosongkan password jika tidak ingin diubah!</small>
                                    <br />
                                    <small class=" text-danger">{{ $errors->first('password') }}</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jenis Kelamin : </label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-mars"></i>
                                        </span>
                                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                            @if (old('jenis_kelamin'))
                                                <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>
                                                    Laki-Laki
                                                </option>
                                                <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>
                                                    Perempuan
                                                </option>
                                            @else
                                                <option value="L" {{ $customer->jenis_kelamin == 'L' ? 'selected' : '' }}>
                                                    Laki-Laki
                                                </option>
                                                <option value="P"
                                                    {{ $customer->jenis_kelamin == 'P' ? 'selected' : '' }}>
                                                    Perempuan
                                                </option>
                                            @endif
                                        </select>
                                    </div>
                                    <small class="text-danger">{{ $errors->first('jenis_kelamin') }}</small>
                                </div>
                                <div class="form-group">
                                    <label>Alamat : </label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-home"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Alamat anda" name="alamat"
                                            value="{{ old('alamat') ? old('alamat') : $customer->alamat }}">
                                    </div>
                                    <small class=" text-danger">{{ $errors->first('alamat') }}</small>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir : </label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                        <input type="date" class="form-control" placeholder="Tanggal lahir anda"
                                            name="tanggal_lahir"
                                            value="{{ old('tanggal_lahir') ? old('tanggal_lahir') : $customer->tanggal_lahir }}">
                                    </div>
                                    <small class="text-danger">{{ $errors->first('tanggal_lahir') }}</small>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer" style="padding:10px 0px;">
                            <button type="submit" class="btn btn-sm btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- #END# Input -->
    </section>

@endsection
