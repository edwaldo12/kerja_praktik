@extends('layout/index')

@section('title', 'Create User PT')

@section('content')
    <section class="content">
        <div class="page-heading">
            <h1>Pengguna</h1>
        </div>
        <div class="page-body clearfix">
            <!-- Input -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Formulir Tambah Pengguna
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama : </label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-id-card"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Nama anda" name="name"
                                            value="{{ old('name') }}">
                                    </div>
                                    <small class="text-danger">{{ $errors->first('name') }}</small>
                                </div>
                                <div class="form-group">
                                    <label>Username : </label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Nama user" name="username"
                                            value="{{ old('username') }}">
                                    </div>
                                    <small class="text-danger">{{ $errors->first('username') }}</small>
                                </div>
                                <div class="form-group">
                                    <label>Password : </label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-lock"></i>
                                        </span>
                                        <input type="password" class="form-control" placeholder="Password anda"
                                            name="password" value="{{ old('password') }}">
                                    </div>
                                    <small class="text-danger">{{ $errors->first('password') }}</small>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir : </label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                        <input type="date" class="form-control" placeholder="Tanggal lahir anda"
                                            name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                                    </div>
                                    <small class="text-danger">{{ $errors->first('tanggal_lahir') }}</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email : </label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Email anda" name="email"
                                            value="{{ old('email') }}">
                                    </div>
                                    <small class="text-danger">{{ $errors->first('email') }}</small>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin : </label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-mars"></i>
                                        </span>
                                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                            <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>
                                                Laki-Laki</option>
                                            <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>
                                                Perempuan</option>
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
                                        <input type="text" class="form-control" placeholder="Alamat anda" name="alamat">
                                    </div>
                                    <small class="text-danger">{{ $errors->first('alamat') }}</small>
                                </div>
                                <div class="form-group">
                                    <label>Jabatan : </label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                        <select name="jabatan" id="jabatan" class="form-control">
                                            <option value="1" {{ old('jabatan') == '1' ? 'selected' : '' }}>Admin
                                            </option>
                                        </select>
                                    </div>
                                    <small class="text-danger">{{ $errors->first('jabatan') }}</small>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer" style="padding:10px 0px;">
                            <button type="submit" class="btn btn-sm btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- #END# Input -->
    </section>

@endsection
