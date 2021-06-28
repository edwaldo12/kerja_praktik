@extends('layout/index')

@section('title', 'Order PT')

@section('content')
    <section class="content">
        <div class="page-body clearfix">
            {{-- <a href="{{ route('orders.create') }}">
                <button type="button" class="btn btn-primary" style="margin-bottom:10px;">Tambah Pesanan Orang</button>
            </a> --}}
            @if (session('Status'))
                <div class="alert alert-success">
                    {{ session('Status') }}
                </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">List Pemesanan</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table" id="data_table">
                            <thead>
                                <tr>
                                    <th>ID Transaksi</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Nomor Telepon Pelanggan</th>
                                    <th>Bukti Pembayaran</th>
                                    <th>Alamat</th>
                                    <th>Total Dibayar</th>
                                    <th>Aksi</th>
                                    <th>Konfirmasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr style="{{ $order->is_product_deleted ? 'color:red' : 'color:black' }}">
                                        <td style="color:inherit">ID-{{ sprintf('%04d', $order->id) }}</td>
                                        <td style="color:inherit">{{ $order->customer->name }}</td>
                                        <td style="color:inherit">
                                            {{ substr($order->created_at, 8, 2) }}-{{ substr($order->created_at, 5, 2) }}-{{ substr($order->created_at, 0, 4) }}
                                        </td>
                                        <td style="color:inherit">0{{ $order->nomor_telepon_pemesan }}</td>
                                        <td>
                                            <img class="img-thumbnail" width="100" style="max-height: 75px;"
                                                src="{{ url('upload_bukti_pembayaran/' . $order->upload_file) }}"
                                                alt="Tidak Ada Foto">
                                        </td>
                                        <td style="color:inherit">{{ $order->alamat }}</td>
                                        <td style="color:inherit">Rp
                                            {{ number_format($order->total_harga_dibayar, 0, ',', '.') }}</td>
                                        <td>
                                            <a class="btn btn-xs btn-info" onclick="showModal('{{ $order->id }}')">
                                                <i class="fa fa-book"></i></a>
                                            {{-- @if (!$order->is_product_deleted)
                                                <a href="{{ route('orders.edit', ['order' => $order->id]) }}"
                                                    class="btn btn-xs btn-warning">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            @endif --}}
                                            {{-- <form style="display:inline;"
                                                action="{{ route('orders.destroy', ['order' => $order->id]) }}"
                                                method="POST" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-xs btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form> --}}

                                        </td>
                                        @if ($order['status'] == 'Menunggu Pembayaran')
                                            <td>
                                                <p class="btn btn-xs btn-danger">
                                                    Menunggu Pembayaran</p>
                                                <a href="{{ route('orders.hapusPesananUser', ['id' => $order->id]) }}">
                                                    <button type="submit" class="btn btn-xs btn-success">
                                                        Batalkan Pesanan
                                                    </button>
                                                </a>
                                            </td>
                                        @elseif ($order['status'] == 'Menunggu Konfirmasi')
                                            <td>
                                                <a href="{{ route('orders.updateStatus', ['id' => $order->id]) }}">
                                                    <button type="submit" class="btn btn-xs btn-warning">
                                                        Konfirmasi Pesanan
                                                    </button>
                                                </a>
                                                <a href="{{ route('orders.hapusPesananUser', ['id' => $order->id]) }}">
                                                    <button type="submit" class="btn btn-xs btn-success">
                                                        Batalkan Pesanan
                                                    </button>
                                                </a>
                                            </td>
                                        @elseif ($order['status'] == 'Sedang Di Proses')
                                            <td>
                                                <a href="{{ route('orders.processOrder', ['id' => $order->id]) }}">
                                                    <button type="submit" class="btn btn-xs btn-info">
                                                        Proses Pesanan
                                                    </button>
                                                </a>
                                            </td>
                                        @elseif ($order['status'] == 'Mengirim Pesanan')
                                            <td>
                                                <a href="{{ route('orders.onDelivery', ['id' => $order->id]) }}">
                                                    <button type="submit" class="btn btn-xs btn-primary">
                                                        Mengirim Barang
                                                    </button>
                                                </a>
                                            </td>
                                        @elseif ($order['status'] == 'Sedang Di Kirim')
                                            <td>
                                                <a href="{{ route('orders.confirm', ['id' => $order->id]) }}">
                                                    <button type="submit" class="btn btn-xs btn-success">
                                                        Selesaikan Pesanan
                                                    </button>
                                                </a>
                                            </td>
                                        @elseif ($order['status'] == 'Selesai')
                                            <td>
                                                <p class="btn btn-xs btn-primary">
                                                    Pesanan Selesai
                                                </p>
                                            </td>
                                        @elseif ($order['status'] == 'Dibatalkan')
                                            <td>
                                                <p class="btn btn-xs btn-primary">
                                                    Pesanan Dibatalkan
                                                </p>
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
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        id="myModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title">Detail Pesanan</div>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered" id="modal-table">
                        <thead>
                            <tr>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Sub Total</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showModal(id) {
            $(function() {
                $.ajax({
                    url: "{{ url('getDetailOrder') }}/" + id,
                    type: "GET",
                    success: function(result) {
                        $('#myModal').modal('show');
                        let details = result.details
                        let table = $("#modal-table tbody")
                        let detail_order = "";
                        console.log(details)
                        for (let i = 0; i < details.length; i++) {
                            detail_order += "<tr>" +
                                "<td>" + formatRupiah(String(details[i].harga_barang)) + "</td>" +
                                "<td>" + details[i].jumlah_pesanan + "</td>" +
                                "<td>" + formatRupiah(String(details[i].sub_total)) + "</td>" +
                                "</tr>"
                        }
                        table.html(detail_order);
                    }
                });
            });
        }
    </script>

@endsection
