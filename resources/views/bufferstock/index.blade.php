@extends('layouts.master')

@section('title', 'Buffer Stock')

@section('konten')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">@yield('title')</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <div class="container">
                        <h2>Total Barang Keluar per Kode Barang</h2>

                        <h3>Total Quantity, Total Days, SS, and Buffer Stock</h3>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Total Quantity</th>
                                    <th>Total Jumlah Hari</th>
                                    <th>SS</th>
                                    <th>Buffer Stock</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bufferStocks as $bufferStock)
                                    <tr>
                                        <td>{{ $bufferStock->kode_barang }}</td>
                                        <td>{{ $bufferStock->nama }}</td>
                                        <td>{{ $bufferStock->total_quantity }}</td>
                                        <td>{{ $bufferStock->jumlah_hari }}</td>
                                        <td>{{ $bufferStock->ss ?? 'N/A' }}</td>
                                        <td>{{ $bufferStock->buffer_stock ?? 'N/A' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <h3>Overall Total Barang Keluar</h3>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Kode Barang</th>
                                    <th>Overall Total Barang Keluar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($overallTotal as $item)
                                    <tr>
                                        <td>{{ $item->kode_barang }}</td>
                                        <td>{{ $item->overall_total }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>

        </div>
    </div>
@endsection
