<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $barangCount = Barang::count();
        $pegawaiCount = Pegawai::count();
        $barangkeluar = BarangKeluar::count();
        $barangmasuk = BarangMasuk::count();

        return view('admin.index', compact('barangCount', 'pegawaiCount','barangkeluar','barangmasuk'));
    }

    public function barang_masuk(){
        $barangMasuks = BarangMasuk::with('barang')->get();
        return view('admin.laporanmasuk', compact('barangMasuks'));
    }
    public function barang_keluar(){
        $barangKeluars = BarangKeluar::with('barang')->get();
        return view('admin.laporankeluar', compact('barangKeluars'));
    }
}
