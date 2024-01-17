@extends('layouts.master')

@section('title', 'Tambah Data Barang')

@section('konten')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">@yield('title')</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="kode_barang">Kode Barang:</label>
                            <input type="text" name="kode_barang" value="{{ old('kode_barang') }}" class="form-control"
                            >
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama:</label>
                            <input type="text" name="nama" value="{{ old('nama') }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="jenis">Jenis:</label>
                            <select name="jenis" class="form-control">
                                <option value="sepatu" {{ old('jenis') == 'sepatu' ? 'selected' : '' }}>Sepatu</option>
                                <option value="sendal" {{ old('jenis') == 'sendal' ? 'selected' : '' }}>Sendal</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ukuran">Ukuran:</label>
                            <input type="text" name="ukuran" value="{{ old('ukuran') }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok:</label>
                            <input type="number" name="stok" value="{{ old('stok') }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto:</label>
                            <input type="file" name="foto" class="form-control-file" onchange="previewFoto(this)">
                            <img id="previewFoto" src="#" alt="Preview" style="max-width: 200px; display: none;">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('barang.index') }}" class="btn btn-danger">Batal</a>
                    </form>

                </div>
                <!-- /.card-body -->
            </div>

        </div>
    </div>
@endsection
