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
    

public function run()
{
    Kategori::create(['nama' => 'Elektronik']);
    Kategori::create(['nama' => 'ATK']);
    Kategori::create(['nama' => 'Furniture']);
}

}
