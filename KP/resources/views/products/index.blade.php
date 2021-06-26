    @extends('layout/index')

    @section('title', 'Products PT')

    @section('content')
        <section class="content">
            <div class="page-body clearfix">
                <a href="{{ route('products.create') }}">
                    <button type="button" class="btn btn-primary" style="margin-bottom:10px;">Tambah Produk</button>
                </a>
                @if (session('Status'))
                    <div class="alert alert-success">
                        {{ session('Status') }}
                    </div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">List Produk</div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table" id="data_table">
                                <thead>
                                    <tr>
                                        <th>Nama Produk</th>
                                        <th>Foto</th>
                                        <th>Jumlah Stok</th>
                                        <th>Harga Produk</th>
                                        <th>Deskripsi</th>
                                        <th>Dibuat Oleh</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->nama_produk }}</td>
                                            <td>
                                                <img class="img-thumbnail" width="100" style="max-height: 75px;"
                                                    src="{{ url('upload_products/' . $product->foto) }}"
                                                    alt="Tidak Ada Foto">
                                            </td>
                                            <td>{{ $product->stocks }}</td>
                                            <td>Rp.
                                                {{ number_format($product->harga_products, 0, ',', '.') }}
                                            </td>
                                            <td>{{ $product->deskripsi }}</td>
                                            <td>{{ $product->user->name }}</td>
                                            <td>
                                                @if (empty($product->deleted_at))
                                                    <a class="btn btn-xs btn-warning"
                                                        href="{{ route('products.edit', ['product' => $product->id]) }}">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                @else
                                                @endif
                                                @if ($product->deleted_at)
                                                    <form style="display:inline;"
                                                        action="{{ route('products.activate', ['id' => $product->id]) }}"
                                                        method="POST">
                                                        @method('put')
                                                        @csrf
                                                        <button type="submit" class="btn btn-xs btn-danger">
                                                            <span>Active Product</span>
                                                        </button>
                                                    </form>
                                                @elseif($product['jumlah_pesanan_terkait'] ||
                                                    empty($product->deleted_at))
                                                    <form style="display:inline;"
                                                        action="{{ route('products.destroy', ['product' => $product->id]) }}"
                                                        method="POST" class="d-inline"
                                                        onsubmit="return confirm('Apakah anda yakin ingin nonaktifkan ? Ada '+'{{ $product['jumlah_pesanan_terkait'] }}'+' Pesanan Terkait')">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-xs btn-success">
                                                            <span>Non Active Product</span>
                                                        </button>
                                                    </form>
                                                @endif
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
