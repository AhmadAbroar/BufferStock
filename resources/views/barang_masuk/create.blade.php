@extends('layouts.master_pegawai')

@section('title', 'Tambah Data Barang Masuk')

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
                    <form action="{{ route('barang_masuk.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="kode_barang">Kode Barang:</label>
                            <select name="kode_barang" id="kode_barang" class="form-control">
                                @foreach($barangs as $barang)
                                    <option value="{{ $barang->kode_barang }}">{{ $barang->kode_barang }} - {{ $barang->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah:</label>
                            <input type="number" name="jumlah" id="jumlah" class="form-control"  min="1">
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah Barang Masuk</button>
                        <a href="{{ route('barang_masuk.index') }}" class="btn btn-danger">Batal</a>
                    </form>

                </div>
                <!-- /.card-body -->
            </div>

        </div>
    </div>
@endsection
