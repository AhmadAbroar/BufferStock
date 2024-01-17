<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;

class PegawaiDashboardController extends Controller
{
    public function index()
    {
        $barangCount = BarangKeluar::count();
        $barangMasukCount = BarangMasuk::count();

        return view('pegawai_dashboard.index', compact('barangCount','barangMasukCount'));
    }
    
}
