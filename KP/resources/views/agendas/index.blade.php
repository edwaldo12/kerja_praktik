@extends('layout/index')

@section('title', 'Agenda PT')

@section('content')
    <section class="content">
        <div class="page-body clearfix">
            <a href="{{ route('agendas.create') }}">
                <button type="button" class="btn btn-primary" style="margin-bottom:10px;">Tambah Agenda Kerja</button>
            </a>
            @if (session('Status'))
                <div class="alert alert-success">
                    {{ session('Status') }}
                </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">List Agenda</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table" id="data_table">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>Tanggal</th>
                                    <th>Foto</th>
                                    <th>Catatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($agendas as $agenda)
                                    <tr>
                                        <td>{{ $agenda->judul }}</td>
                                        <td>{{ $agenda->tanggal }}</td>
                                        <td>
                                            <img class="img-thumbnail" width="100" style="max-height: 75px;"
                                                src="{{ urL('upload_agendas/' . $agenda->foto) }}" alt="Tidak Ada Foto">

                                        </td>
                                        <td>{{ $agenda->catatan }}</td>
                                        <td>
                                            <a href="{{ route('agendas.edit', ['agenda' => $agenda->id]) }}"
                                                class="btn btn-xs btn-warning">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <form style="display:inline;"
                                                action="{{ route('agendas.destroy', ['agenda' => $agenda->id]) }}"
                                                method="POST" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-xs btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection
