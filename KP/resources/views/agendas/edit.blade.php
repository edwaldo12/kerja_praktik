@extends('layout/index')

@section('title', 'Edit Agendas')

@section('content')
    <section class="content">
        <div class="page-heading">
            <h1>Agenda</h1>
        </div>
        <div class="page-body clearfix">
            <!-- Input -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Formulir Pengubahan Agenda
                </div>
                <div class="panel-body">
                    <form method="POST" enctype="multipart/form-data"
                        action="{{ route('agendas.update', ['agenda' => $agenda->id]) }}">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Judul : </label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-id-card"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Judul..." name="judul"
                                            value="{{ old('judul') ? old('judul') : $agenda->judul }}">
                                    </div>
                                    <small class=" text-danger">{{ $errors->first('judul') }}</small>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Agenda : </label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                        <input type="date" class="form-control" placeholder="Tanggal..." name="tanggal"
                                            value="{{ old('tanggal') ? old('tanggal') : $agenda->tanggal }}">
                                    </div>
                                    <small class="text-danger">{{ $errors->first('tanggal') }}</small>
                                </div>
                                <div class="form-group">
                                    <label>Nama Pengupload : </label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-id-card"></i>
                                        </span>
                                        <input type="text" class="form-control" readonly
                                            value="{{ $agenda->user->name }}">
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
                                            value="{{ old('foto') ? old('foto') : $agenda->foto }}">
                                    </div>
                                    <small class="text-danger">{{ $errors->first('foto') }}</small>
                                </div>
                                <div class="form-group">
                                    <label>Catatan : </label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Catatan..." name="catatan"
                                            value="{{ old('catatan') ? old('catatan') : $agenda->catatan }}">
                                    </div>
                                    <small class="text-danger">{{ $errors->first('catatan') }}</small>
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
