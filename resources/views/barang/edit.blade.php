@extends('layouts.master')

@section('title', 'Update Data Barang')

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
                    <form action="{{ route('barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="kode_barang">Kode Barang:</label>
                            <input type="text" name="kode_barang" value="{{ old('kode_barang', $barang->kode_barang) }}" class="form-control" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama:</label>
                            <input type="text" name="nama" value="{{ old('nama', $barang->nama) }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="jenis">Jenis:</label>
                            <select name="jenis" class="form-control">
                                <option value="sepatu" {{ old('jenis', $barang->jenis) == 'sepatu' ? 'selected' : '' }}>Sepatu</option>
                                <option value="sendal" {{ old('jenis', $barang->jenis) == 'sendal' ? 'selected' : '' }}>Sendal</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ukuran">Ukuran:</label>
                            <input type="text" name="ukuran" value="{{ old('ukuran', $barang->ukuran) }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok:</label>
                            <input type="number" name="stok" value="{{ old('stok', $barang->stok) }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto:</label>
                            @if($barang->foto)
                                <img src="{{ asset('storage/' . $barang->foto) }}" alt="{{ $barang->nama }}" style="max-width: 200px; margin-bottom: 10px;">
                                <br>
                            @endif
                            <input type="file" name="foto" class="form-control-file">
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
