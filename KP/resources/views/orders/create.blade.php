@extends('layout/index')

@section('title', 'Create Order PT')

@section('content')
    <section class="content">
        <div class="page-heading">
            <h1>Pesanan</h1>
        </div>
        <div class="page-body clearfix">
            <!-- Input -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Formulir Tambah Pesanan
                </div>
                <div class="panel-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_pemesan">Nama Pemesan : </label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-id-card"></i>
                                    </span>
                                    <select name="fk_customer" id="fk_customer" class="form-control">
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer['id'] }}">
                                                {{ $customer['name'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <small id="error_nama_pemesan" class="text-danger"></small>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat : </label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                    <input type="text" class="form-control" placeholder="Alamat Pemesan" name="alamat"
                                        id="alamat">
                                </div>
                                <small id="error_alamat" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nomor_telepon_pemesan">Nomor Telepon Pemesan : </label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-home"></i>
                                    </span>
                                    <input type="tel" class="form-control" placeholder="" name="nomor_telepon_pemesan"
                                        id="nomor_telepon_pemesan">
                                </div>
                                <small id="error_nomor_telepon_pemesan" class="text-danger"></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Input -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Pesanan Detail
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 col-xs-5 col-sm-5">
                            <div class="form-group">
                                <label for="">Produk : </label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-plus-square"></i>
                                    </span>
                                    <select name="fk_produk" id="produk" class="form-control">
                                        @foreach ($products as $p)
                                            <option data-harga="{{ $p['harga_products'] }}" value="{{ $p['id'] }}">
                                                {{ $p['nama_produk'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <small class="text-danger">{{ $errors->first('nama_produk') }}</small>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-5 col-sm-5">
                            <div class="form-group">
                                <label>Jumlah : </label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-home"></i>
                                    </span>
                                    <input min="1" max="100" type="number" class="form-control" placeholder=""
                                        name="jumlah_pesanan" value="{{ old('jumlah_pesanan') ?: 1 }}"
                                        id="jumlah_pesanan">
                                </div>
                                <small class="text-danger">{{ $errors->first('jumlah_pesanan') }}</small>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-2 col-sm-2">
                            <div class="form-group">
                                <label for=""></label>
                                <div style="margin-top:6px;">
                                    <button type="button" class="btn btn-sm btn-success"
                                        onclick="addDetailOrder()">Tambah</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Produk</th>
                                        <th>Harga Per Produk</th>
                                        <th>Jumlah Pesanan</th>
                                        <th>Sub Total</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="detail_order_body"></tbody>
                            </table>
                            <p id="total" style="padding-left:8px"></p>
                            <button type="button" class="btn btn-sm btn-success" onclick="storeOrder()">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Input -->
    </section>

    <script>
        // Data detil order
        let detailOrder = [];

        function refreshTable() {
            $(function() {
                let listDetail = "";
                for (let i = 0; i < detailOrder.length; i++) {
                    listDetail += "<tr>" +
                        "<td>" + detailOrder[i].nama_produk + "</td>" +
                        "<td>" + formatRupiah(String(detailOrder[i].harga_barang)) + "</td>" +
                        "<td>" + detailOrder[i].jumlah_pesanan + "</td>" +
                        "<td>" + formatRupiah(String(detailOrder[i].subtotal)) + "</td>" +
                        "<td>" +
                        "<button class='btn btn-xs btn-danger' onclick='removeOrder(" + i +
                        ")'><i class='fa fa-close'></i></button>" +
                        "</td>" +
                        "</tr>"
                }
                $('#detail_order_body').html(listDetail);
            });
            calculateTotal();
        }

        async function addDetailOrder() {
            let stock = await getStock()
            let id_produk = $("#produk option:selected").val();
            let cari = detailOrder.find(function(order) {
                return order.id_produk == id_produk;
            });
            let jumlahInput = parseInt($("#jumlah_pesanan").val());
            if (cari != undefined) {
                if (stock < (jumlahInput + cari.jumlah_pesanan)) {
                    alert("Stock Barang tidak cukup.")
                    return;
                }
            } else {
                if (stock < jumlahInput) {
                    alert("Stock Barang tidak cukup.")
                    return;
                }
            }

            $(function() {
                if ($("#jumlah_pesanan").val() <= 0 || $("#jumlah_pesanan") == "") {
                    alert("Jumlah pesanan harus diisi !");
                    return;
                }
                let id_produk = $("#produk option:selected").val();
                let cari = detailOrder.find(function(order) {
                    return order.id_produk == id_produk;
                });

                if (cari != undefined) {
                    let index = detailOrder.indexOf(cari);
                    let jumlah = $("#jumlah_pesanan").val();
                    let harga = $("#produk option:selected").data('harga');
                    detailOrder[index].jumlah_pesanan += parseInt($("#jumlah_pesanan").val());
                    detailOrder[index].subtotal += jumlah * harga;
                } else {
                    let jumlah = parseInt($("#jumlah_pesanan").val());
                    let harga = parseInt($("#produk option:selected").data('harga'));
                    let order = {
                        id_produk: id_produk,
                        nama_produk: $("#produk option:selected").text(),
                        jumlah_pesanan: jumlah,
                        harga_barang: harga,
                        subtotal: jumlah * harga
                    };

                    detailOrder.push(order);
                }
                refreshTable();
            });
        }

        function calculateTotal() {
            let total = 0;
            for (let i = 0; i < detailOrder.length; i++) {
                total += detailOrder[i].subtotal;
            }
            $("#total").text("Total Harga : " + formatRupiah(String(total)));
        }

        function removeOrder(index) {
            detailOrder.splice(index, 1);
            refreshTable();
        }

        function validate() {
            let isValidationError = false;
            let nama_pemesan = $("#nama_pemesan").val();
            let alamat = $("#alamat").val();
            let nomor_telepon_pemesan = $("#nomor_telepon_pemesan").val();
            let foto = $("#foto").val();

            let isNamaPemesanEmpty = nama_pemesan == "";
            $("#error_nama_pemesan").html(isNamaPemesanEmpty ? "Nama tidak boleh kosong." : "")
            isValidationError = isValidationError || isNamaPemesanEmpty;

            let isAlamatEmpty = alamat == "";
            $("#error_alamat").html(isAlamatEmpty ? "Alamat tidak boleh kosong." : "")
            isValidationError = isValidationError || isAlamatEmpty;

            let isNomorTeleponEmpty = nomor_telepon_pemesan == "";
            $("#error_nomor_telepon_pemesan").html(isNomorTeleponEmpty ? "Nomor Telepon tidak boleh kosong." : "")
            isValidationError = isValidationError || isNomorTeleponEmpty;

            if (!isNomorTeleponEmpty) {
                console.log("test");
                let isNomorNumber = !hasNumbers(nomor_telepon_pemesan)
                $("#error_nomor_telepon_pemesan").html(isNomorNumber ? "Nomor Telepon harus berisi angka." : "")
                isValidationError = isValidationError || isNomorNumber;
            }
            if (detailOrder.length < 1) {
                alert("Pesanan tidak boleh kosong.")
                isValidationError = true;
            }
            return isValidationError;
        }

        function storeOrder() {
            if (validate())
                return;

            $(function() {
                let token = $("input[name='_token']").val();
                let order = {
                    fk_customer: $("#fk_customer").val(),
                    alamat: $("#alamat").val(),
                    nomor_telepon_pemesan: $("#nomor_telepon_pemesan").val(),
                }
                $.ajax({
                    type: "POST",
                    url: "{{ route('orders.store') }}",
                    data: {
                        order: order,
                        detailOrder: detailOrder,
                        _token: token
                    },
                    success: function(result) {
                        if (result.success) {
                            alert('Pesanan Berhasil ditambah.')
                            window.location.href = "{{ route('orders.index') }}";
                        }
                    }
                })
            })
        }

        function hasNumbers(t) {
            var regex = /^[0-9]+$/;
            return regex.test(t);
        }

        async function getStock() {
            let stock = 0;
            let id = $("#produk").val()
            let jumlahInput = parseInt($("#jumlah_pesanan").val())

            await $.ajax({
                type: "GET",
                url: "{{ url('checkStock') }}/" + id,
                success: function(produk) {
                    stock = produk.stocks
                }
            });
            return stock;
        }
    </script>

@endsection
