<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lokasi;

class LokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    

    public function run()
    {
        Lokasi::create(['nama' => 'Gudang 1']);
        Lokasi::create(['nama' => 'Gudang 2']);
        Lokasi::create(['nama' => 'Rak A']);
    }

}
