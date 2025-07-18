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
        ['nama_kategori' => 'Mudah', 'durasi' => '5 menit'],
        ['nama_kategori' => 'Sedang', 'durasi' => '10 menit'],
        ['nama_kategori' => 'Sulit', 'durasi' => '15 menit'],
    ];

    foreach ($kategori as $item) {
        Kategori::create($item);
    }
    }
}
