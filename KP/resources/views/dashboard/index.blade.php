@extends('layout/index')

@section('title', 'Graphs')

@section('content')
    <section class="content">
        <div class="page-body clearfix">

            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box infobox-type-5 hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">supervisor_account</i>
                        </div>
                        <div class="content" style="min-height: 1360px;">
                            <div class="text">Jumlah Pengguna</div>
                            <div class="number">{{ $total_user }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box infobox-type-5 hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">equalizer</i>
                        </div>
                        <div class="content" style="min-height: 1360px;">
                            <div class="text">Banyak Produk</div>
                            <div class="number">{{ $total_produk }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box infobox-type-5 hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">shopping_cart</i>
                        </div>
                        <div class="content" style="min-height: 1360px;">
                            <div class="text">Terjual</div>
                            <div class="number">{{ $total_order }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box infobox-type-5 hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <div class="content" style="min-height: 1360px;">
                            <div class="text">Jumlah Agenda</div>
                            <div class="number">{{ $total_agenda }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Line Chart -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Omset Penjualan</div>
                        <div class="panel-body">
                            <div id="chart_1"></div>
                        </div>
                    </div>
                </div>
                <!-- #END# Line Chart -->
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Grafik Penjualan Perbulan</div>
                        <div class="panel-body">
                            <div id="bar_chart"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@push('grafik')
    <script>
        $(function() {
            var pesanan_perbulan = [];
            $.ajax({
                "url": "{{ url('pesanan_perbulan') }}",
                "type": "GET",
                "success": function(result) {
                    for (i = 0; i < result.length; i++) {
                        pesanan_perbulan.push({
                            y: result[i].nama_produk,
                            a: result[i].pesanan
                        });
                    }
                    Morris.Bar({
                        element: 'bar_chart',
                        data: pesanan_perbulan,
                        xkey: 'y',
                        ykeys: ['a'],
                        labels: ['Terjual'],
                        barColors: ['lightblue']
                    });
                }
            });
        })
    </script>
@endpush


@push('omset_penjualan')
    <script>
        $.ajax({
            "url": "{{ url('omset_bulanan') }}",
            "type": "GET",
            "success": function(result) {
                console.log(result);
                var chart1 = c3.generate({
                    bindto: '#chart_1',
                    data: {
                        columns: [
                            result
                        ],
                        colors: {
                            'Series A': '#16a085'
                        }
                    },
                    axis: {
                        x: {
                            type: 'category',
                            categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli',
                                'Agustus', 'September', 'Oktober', 'November', 'Desember'
                            ],
                            label: 'Bulan',

                        },
                        y: {
                            label: 'Omset'
                        }

                    },
                    grid: {
                        x: {
                            show: true
                        },
                        y: {
                            show: true
                        }
                    }
                });
            }
        })
    </script>
@endpush
