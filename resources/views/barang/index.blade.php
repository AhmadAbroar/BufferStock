@extends('layouts.master')

@section('title', 'Data Barang')

@section('konten')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">@yield('title')</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <a href="{{ route('barang.create') }}" class="btn btn-primary mb-3">+ Tambah Data</a>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama</th>
                                <th>Jenis</th>
                                <th>Ukuran</th>
                                <th>Stok</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barangs as $barang)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $barang->kode_barang }}</td>
                                    <td>{{ $barang->nama }}</td>
                                    <td>{{ $barang->jenis }}</td>
                                    <td>{{ $barang->ukuran }}</td>
                                    <td>{{ $barang->stok }}</td>
                                    <td>
                                        @if($barang->foto)
                                            <img src="{{ asset('storage/' . $barang->foto) }}" alt="{{ $barang->nama }}" width="50">
                                        @else
                                            No Photo
                                        @endif
                                    </td>
                                    <td>
                                        <div class="row btn-group">
                                            <a class="btn btn-outline-primary" href="{{ route('barang.edit', $barang->id) }}"><i
                                                    class="nav-icon fas fa-edit"></i></a>
                                            <form action="{{ route('barang.destroy', $barang->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger"
                                                    onclick="return confirm('Are you sure?')"><i
                                                    class="nav-icon fas fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
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
