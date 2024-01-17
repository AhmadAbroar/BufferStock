<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BufferStockController extends Controller
{
    public function index()
    {
        // Get the current month and year
        $currentMonth = Carbon::now()->format('m');
        $currentYear = Carbon::now()->format('Y');

        // Retrieve the total quantity and total number of days barang_keluar per kode_barang for the current month
        $bufferStocks = $this->getTotalQuantityAndDays($currentMonth, $currentYear);

        // Retrieve the overall total barang_keluar per kode_barang for the current month
        $overallTotal = $this->getOverallTotal();

        // Calculate ss (overall_total / jumlah_hari) for each kode_barang
        foreach ($bufferStocks as $bufferStock) {
            $kodeBarang = $bufferStock->kode_barang;

            // Find the corresponding overall total for the kode_barang
            $matchingOverallTotal = $overallTotal->firstWhere('kode_barang', $kodeBarang);

            // Calculate ss and add it to the bufferStock object
            $ss = $matchingOverallTotal ? ($matchingOverallTotal->overall_total / $bufferStock->jumlah_hari) : null;
            $bufferStock->ss = $ss;

            $bufferStock->buffer_stock = $ss + $bufferStock->total_quantity;
        }

        return view('bufferstock.index', compact('bufferStocks', 'overallTotal'));
    }

    private function getTotalQuantityAndDays($currentMonth, $currentYear)
    {
        return DB::table('barangs')
            ->leftJoin('barang_keluars', 'barangs.kode_barang', '=', 'barang_keluars.kode_barang')
            ->select(
                'barangs.kode_barang',
                'barangs.nama',
                DB::raw('SUM(barang_keluars.jumlah_keluar) as total_quantity'),
                DB::raw('COUNT(DISTINCT barang_keluars.tanggal_keluar) as jumlah_hari')
            )
            ->whereMonth('barang_keluars.tanggal_keluar', $currentMonth)
            ->whereYear('barang_keluars.tanggal_keluar', $currentYear)
            ->groupBy('barangs.kode_barang', 'barangs.nama')
            ->get();
    }

    private function getOverallTotal()
    {
        return DB::table('barang_keluars')
            ->select('kode_barang', DB::raw('SUM(jumlah_keluar) as overall_total'))
            ->groupBy('kode_barang')
            ->get();
    }
}
