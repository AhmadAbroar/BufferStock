@extends('layouts.master_pegawai')

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
                    <a href="{{ route('barangkeluar.create') }}" class="btn btn-primary mb-3">+ Tambah Data</a>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Kode Barang</th>
                                <th>Jumlah Keluar</th>
                                <th>Tanggal Keluar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($barangKeluars as $barangKeluar)
                                <tr>
                                    <td>{{ $barangKeluar->kode_barang }}</td>
                                    <td>{{ $barangKeluar->jumlah_keluar }}</td>
                                    <td>{{ $barangKeluar->tanggal_keluar }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if (session('success'))
                        <script>
                            toastr.success("{{ session('success') }}", "Success");
                        </script>
                    @endif
                    @if (session('error'))
                        <script>
                            toastr.error("{{ session('error') }}", "Gagal");
                        </script>
                    @endif
                </div>
                <!-- /.card-body -->
            </div>

        </div>
    </div>
@endsection
