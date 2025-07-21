<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategori = [
        ['nama_kategori' => 'Makanan'],
        ['nama_kategori' => 'Minuman'],
        ['nama_kategori' => 'Cemilan'],
    ];

    foreach ($kategori as $item) {
        Kategori::create($item);
    }
    }
}
