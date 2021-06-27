<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori')->insert([
            [
                'nama_kategori' => 'pria' ,
            ],
            [
                'nama_kategori' => 'wanita' ,
            ],

            [   'nama_kategori' => 'anak-anak',
            ],
            [   'nama_kategori' => 'couple',
            ],
            [   'nama_kategori' => 'aksesoris',
            ],
        ]);
    }
}
