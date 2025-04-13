<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            [
                'name' => 'Nasi Goreng',
                'kategori' => 'makanan',
                'img' => 'image/nasi_goreng.jpg', // Ganti dengan nama file gambar yang sesuai
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Es Teh',
                'kategori' => 'minuman',
                'img' => 'image/es_teh.jpg', // Ganti dengan nama file gambar yang sesuai
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mie Goreng',
                'kategori' => 'makanan',
                'img' => 'image/mie_goreng.jpg', // Ganti dengan nama file gambar yang sesuai
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jus Jeruk',
                'kategori' => 'minuman',
                'img' => 'image/jus_jeruk.jpg', // Ganti dengan nama file gambar yang sesuai
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
