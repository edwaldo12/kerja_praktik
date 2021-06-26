@extends('layout/index')

@section('title', 'User PT')

@section('content')
    <section class="content">
        <div class="page-body clearfix">
            <a href="{{ route('users.create') }}">
                <button type="button" class="btn btn-primary" style="margin-bottom:10px;">Tambah Pengguna</button>
            </a>

            @if (session('Status'))
                <div class="alert alert-success">
                    {{ session('Status') }}
                </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">List Users</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table" id="data_table">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Umur</th>
                                    <th>Jabatan</th>
                                    <th>Alamat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->jenis_kelamin }}</td>
                                        <td>{{ $user->umur }} Tahun</td>
                                        @if ($user->jabatan == '1')
                                            <td>Admin</td>
                                        @endif
                                        <td>{{ $user->alamat }}</td>
                                        @if (empty($user->deleted_at))
                                            <td>
                                                <a href="{{ route('users.edit', ['user' => $user->id]) }}"
                                                    class="btn btn-xs btn-warning">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <form style="display:inline;"
                                                    action="{{ route('users.destroy', ['user' => $user->id]) }}"
                                                    method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-xs btn-success">
                                                        <span>Non Active User</span>
                                                    </button>
                                                </form>
                                            </td>
                                        @else
                                            <td>
                                                <form style="display:inline;"
                                                    action="{{ route('user.activate', ['id' => $user->id]) }}"
                                                    method="POST">
                                                    @method('put')
                                                    @csrf
                                                    <button type="submit" class="btn btn-xs btn-danger">
                                                        <span>Active User</span>
                                                    </button>
                                                </form>
                                            </td>
                                        @endif
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
