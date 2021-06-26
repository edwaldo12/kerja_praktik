@extends('CompanyProfile/index')

@section('title', 'Create Account')

@section('content')
    <section class="blog-details">
        <div class="container">
            <p style="text-align: center"> Create Your Account </p><br />
            <div class="card" style="padding: 8px">
                <div class="card-body">
                    <form method="POST" action="{{ route('customer.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama : </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Nama anda" name="name"
                                            value="{{ old('name') }}">
                                    </div>
                                    <small class="text-danger">{{ $errors->first('name') }}</small>
                                </div>
                                <div class="form-group">
                                    <label>Username : </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Nama user" name="username"
                                            value="{{ old('username') }}">
                                    </div>
                                    <small class="text-danger">{{ $errors->first('username') }}</small>
                                </div>
                                <div class="form-group">
                                    <label>Password : </label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" placeholder="Password anda"
                                            name="password" value="{{ old('password') }}">
                                    </div>
                                    <small class="text-danger">{{ $errors->first('password') }}</small>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir : </label>
                                    <div class="input-group">
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
                                        <input type="text" class="form-control" placeholder="Email anda" name="email"
                                            value="{{ old('email') }}">
                                    </div>
                                    <small class="text-danger">{{ $errors->first('email') }}</small>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin : </label>
                                    <div class="input-group">
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
                                        <input type="text" class="form-control" placeholder="Alamat anda" name="alamat">
                                    </div>
                                    <small class="text-danger">{{ $errors->first('alamat') }}</small>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer" style="padding:10px 0px;">
                            <button type="submit" class="btn btn-sm btn-success"
                                style="float: right; padding: 7px; width: 12%">Register</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Input -->

        </div>
        <!-- #END# Input -->
    </section>

@endsection
