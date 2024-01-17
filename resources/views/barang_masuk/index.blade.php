@extends('layouts.master_pegawai')

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
                    <a href="{{ route('barang_masuk.create') }}" class="btn btn-primary mb-3">+ Tambah Data</a>
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
