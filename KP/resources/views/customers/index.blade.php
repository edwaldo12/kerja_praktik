@extends('layout/index')

@section('title', 'Pelanggan')

@section('content')
    <section class="content">
        <div class="page-body clearfix">
            {{-- <a href="{{ route('customers.create') }}">
                <button type="button" class="btn btn-primary" style="margin-bottom:10px;">Tambah Pengguna</button>
            </a> --}}

            @if (session('Status'))
                <div class="alert alert-success">
                    {{ session('Status') }}
                </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">List Pelanggan</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table" id="data_table">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Alamat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                    <tr>
                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->username }}</td>
                                        <td>{{ $customer->jenis_kelamin }}</td>
                                        <td>{{ $customer->tanggal_lahir }}</td>
                                        <td>{{ $customer->alamat }}</td>
                                        @if (empty($customer->deleted_at))
                                            <td>
                                                <a class="btn btn-xs btn-warning"
                                                    href="{{ route('halaman.edit.pelanggan', ['customer' => $customer->id]) }}">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <form style="display:inline;"
                                                    action="{{ route('customers.destroy', ['customer' => $customer->id]) }}"
                                                    method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-xs btn-success">
                                                        <span>Non Active Customer</span>
                                                    </button>
                                                </form>
                                            </td>
                                        @else
                                            <td>
                                                <form style="display:inline;"
                                                    action="{{ route('customer.activate', ['id' => $customer->id]) }}"
                                                    method="POST">
                                                    @method('put')
                                                    @csrf
                                                    <button type="submit" class="btn btn-xs btn-danger">
                                                        <span>Active Customer</span>
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
