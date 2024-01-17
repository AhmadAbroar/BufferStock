@extends('layouts.master')

@section('title', 'Data Barang Masuk')

@section('konten')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">@yield('title')</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Tanggal Masuk</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barangMasuks as $barangMasuk)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $barangMasuk->kode_barang }}</td>
                                    <td>{{ $barangMasuk->barang ? $barangMasuk->barang->nama : 'N/A' }}</td>
                                    <td>{{ $barangMasuk->jumlah }}</td>
                                    <td>{{ $barangMasuk->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>

        </div>
    </div>
@endsection
