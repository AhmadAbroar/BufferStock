<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangs = Barang::all();
        return view('barang.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|unique:barangs',
            'nama' => 'required',
            'jenis' => 'required|in:sepatu,sendal',
            'ukuran' => 'required',
            'stok' => 'required|numeric|min:0',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('public/barang_fotos');
            $fotoPath = str_replace('public/', '', $fotoPath);
        }

        Barang::create([
            'kode_barang' => $request->input('kode_barang'),
            'nama' => $request->input('nama'),
            'jenis' => $request->input('jenis'),
            'ukuran' => $request->input('ukuran'),
            'stok' => $request->input('stok'),
            'foto' => $fotoPath,
        ]);

        return redirect()->route('barang.index')->with('success', 'Barang created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = Barang::find($id);
        return view('barang.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_barang' => 'required|unique:barangs,kode_barang,' . $id,
            'nama' => 'required',
            'jenis' => 'required|in:sepatu,sendal',
            'ukuran' => 'required',
            'stok' => 'required|numeric|min:0',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $barang = Barang::find($id);

        // Upload foto jika ada
        $fotoPath = $barang->foto;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('barang_fotos', 'public');
        }

        // Update data di dalam database
        $barang->update([
            'kode_barang' => $request->input('kode_barang'),
            'nama' => $request->input('nama'),
            'jenis' => $request->input('jenis'),
            'ukuran' => $request->input('ukuran'),
            'stok' => $request->input('stok'),
            'foto' => $fotoPath,
        ]);

        return redirect()->route('barang.index')->with('success','Berhasil update barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Barang::destroy($id);

        return redirect()->route('barang.index')->with('success','Berhasil hapus barang');
    }
}
