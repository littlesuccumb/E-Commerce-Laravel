<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Transaksi;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define product data
        $products = [
            [
                'nama' => 'Sepatu',
                'status' => 'Tersedia',
                'stok' => 10,
                'harga' => 100000
            ],
            [
                'nama' => 'Sendal',
                'status' => 'Tersedia',
                'stok' => 20,
                'harga' => 10000
            ],
            [
                'nama' => 'Baju',
                'status' => 'Tersedia',
                'stok' => 15,
                'harga' => 50000
            ],
            [
                'nama' => 'Celana',
                'status' => 'Tersedia',
                'stok' => 10,
                'harga' => 70000
            ],
            [
                'nama' => 'Tas',
                'status' => 'Tidak Tersedia',
                'stok' => 0,
                'harga' => 30000
            ],
            [
                'nama' => 'Pensil',
                'status' => 'Tidak Tersedia',
                'stok' => 0,
                'harga' => 5000
            ],
            [
                'nama' => 'Kursi',
                'status' => 'Tersedia',
                'stok' => 20,
                'harga' => 40000
            ],
            [
                'nama' => 'Meja',
                'status' => 'Tidak Tersedia',
                'stok' => 0,
                'harga' => 200000
            ],
            [
                'nama' => 'Kasur',
                'status' => 'Tidak tersedia',
                'stok' => 0,
                'harga' => 250000
            ],
            [
                'nama' => 'Kacamata',
                'status' => 'Tersedia',
                'stok' => 10,
                'harga' => 100000
            ],
            // Add more product data as needed
        ];
        
        foreach ($products as $product) {
            Product::create($product);
        }
    }
}