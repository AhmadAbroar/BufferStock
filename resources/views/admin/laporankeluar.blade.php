@extends('layouts.master')

@section('title', 'Data Barang Keluar')

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
                                <th>Jumlah Keluar</th>
                                <th>Tanggal Keluar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($barangKeluars as $barangKeluar)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $barangKeluar->kode_barang }}</td>
                                    <td>{{ $barangKeluar->barang ? $barangKeluar->barang->nama : 'N/A' }}</td>
                                    <td>{{ $barangKeluar->jumlah_keluar }}</td>
                                    <td>{{ $barangKeluar->tanggal_keluar }}</td>
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
