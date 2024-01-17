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
                    <a href="{{ route('pegawais.create') }}" class="btn btn-primary mb-3">+ Tambah Data</a>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Jenis Kelamin</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pegawais as $pegawai)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pegawai->nama }}</td>
                                    <td>{{ $pegawai->alamat }}</td>
                                    <td>{{ $pegawai->jenis_kelamin }}</td>
                                    <td>{{ $pegawai->email }}</td>
                                    <td>
                                        <div class="row btn-group">
                                            <a class="btn btn-outline-primary"
                                                href="{{ route('pegawais.edit', $pegawai->id) }}"><i
                                                    class="nav-icon fas fa-edit"></i></a>
                                            <form action="{{ route('pegawais.destroy', $pegawai->id) }}" method="post">
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
