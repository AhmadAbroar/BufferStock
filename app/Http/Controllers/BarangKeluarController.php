<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function create()
    {
        $barangs = Barang::all();
        return view('barangkeluar.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|exists:barangs,kode_barang',
            'jumlah_keluar' => 'required|integer|min:1',
            'tanggal_keluar' => 'required|date',
        ]);

        // Create a new BarangKeluar record
        BarangKeluar::create([
            'kode_barang' => $request->input('kode_barang'),
            'jumlah_keluar' => $request->input('jumlah_keluar'),
            'tanggal_keluar' => $request->input('tanggal_keluar'),
        ]);

        // Update the stok in the Barang model
        $barang = Barang::where('kode_barang', $request->input('kode_barang'))->first();
        $barang->stok -= $request->input('jumlah_keluar');
        $barang->save();

        return redirect()->route('barangkeluar.index')->with('success', 'Barang keluar berhasil dicatat.');
    }

    public function index()
    {
        $barangKeluars = BarangKeluar::with('barang')->get();
        return view('barangkeluar.index', compact('barangKeluars'));
    }
}
