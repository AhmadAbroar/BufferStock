<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $barangs = [
            [
                'kode_barang' => 'B001',
                'nama' => 'Sepatu Olahraga',
                'jenis' => 'sepatu',
                'ukuran' => '42',
                'stok' => 50,
                'foto' => null, // You can set the path to a sample image if needed
            ],
            [
                'kode_barang' => 'B002',
                'nama' => 'Sendal Pantai',
                'jenis' => 'sendal',
                'ukuran' => '40',
                'stok' => 30,
                'foto' => null,
            ],
            [
                'kode_barang' => 'B003',
                'nama' => 'Sendal Rumah',
                'jenis' => 'sendal',
                'ukuran' => '40',
                'stok' => 20,
                'foto' => null,
            ],
            [
                'kode_barang' => 'B004',
                'nama' => 'Sepatu Adidas',
                'jenis' => 'sepatu',
                'ukuran' => '41',
                'stok' => '10',
                'foto' => null,
            ],
            [
                'kode_barang' => 'B005',
                'nama' => 'Sendal Swallow',
                'jenis' => 'sendal',
                'ukuran' => '40',
                'stok' => 30,
                'foto' => null,
            ],
            [
                'kode_barang' => 'B006',
                'nama' => 'Sendal Swallow Hitam',
                'jenis' => 'sendal',
                'ukuran' => '40',
                'stok' => 20,
                'foto' => null,
            ],
            [
                'kode_barang' => 'B007',
                'nama' => 'Sepatu Eiger',
                'jenis' => 'sepatu',
                'ukuran' => '42',
                'stok' => 10,
                'foto' => null,
            ],
            [
                'kode_barang' => 'B008',
                'nama' => 'Sepatu Eiger',
                'jenis' => 'sepatu',
                'ukuran' => '41',
                'stok' => 10,
                'foto' => null,
            ],
            [
                'kode_barang' => 'B009',
                'nama' => 'Sepatu Eiger',
                'jenis' => 'sepatu',
                'ukuran' => '40',
                'stok' => 10,
                'foto' => null,
            ],
            [
                'kode_barang' => 'B010',
                'nama' => 'Sepatu Eiger',
                'jenis' => 'sepatu',
                'ukuran' => '43',
                'stok' => 10,
                'foto' => null,
            ],
            // Add more sample data as needed
        ];

        // Insert the data into the database
        foreach ($barangs as $barang) {
            Barang::create($barang);
        }
    }
}
