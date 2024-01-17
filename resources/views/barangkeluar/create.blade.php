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
                    <form method="POST" action="{{ route('barangkeluar.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="kode_barang">Kode Barang:</label>
                            <select name="kode_barang" id="kode_barang" class="form-control">
                                @foreach ($barangs as $barang)
                                    <option value="{{ $barang->kode_barang }}">{{ $barang->kode_barang }} -
                                        {{ $barang->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="jumlah_keluar">Jumlah Keluar:</label>
                            <input type="number" name="jumlah_keluar" id="jumlah_keluar" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="tanggal_keluar">Tanggal Keluar:</label>
                            <input type="date" name="tanggal_keluar" id="tanggal_keluar" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>

        </div>
    </div>
@endsection
