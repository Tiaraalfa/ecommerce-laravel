<?php

namespace Database\Seeders;
use App\Models\Barang;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
        'nama_produk',
        'foto_barang',
        'harga',
        'qty',
        'deskripsi',
    ]);
      
    }
}
