<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['nama_kategori' => 'Nasi'],
            ['nama_kategori' => 'Mie'],
            ['nama_kategori' => 'Gorengan'],
            ['nama_kategori' => 'Sayur'],
            ['nama_kategori' => 'Lauk'],
            ['nama_kategori' => 'Minuman'],
            ['nama_kategori' => 'Cemilan'],
        ];

        foreach ($categories as $category) {
            Kategori::create($category);
        }
    }
}
