<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produk')->insert([
            [
                'id_produk' => 'pr001' ,
                'nama' => 'Erigo T-Shirt Japan Mask Navy ',
                'keterangan' => 'Bahan kain katun',
                'ukuran' => 'L',
                'harga' => '50000',
                'file' => '7cd1a3be-bf15-4be3-9738-1cf570fe7d14.jpg',
                'kategori' => 'pria',
                'stok' => '257',
            ],
            [
                'id_produk' => 'wn001' ,
                'nama' => 'Chamele - Kemeja Kantor Polos Basic Lengan Panjang',
                'keterangan' => 'Bahan Kain Denim',
                'ukuran' => 'M',
                'harga' => '100000',
                'file' => '7095752_9a588c55-6fc2-4ffa-8b5f-478cd62ad6c4_2048_2048.jpg',
                'kategori' => 'wanita',
                'stok' => '200',
            ],

            [   'id_produk' => 'an001',
                'nama' => 'Baju kaos Anak Seri Wibu Limited Edition',
                'keterangan' => 'Bahan kain katun',
                'ukuran' => 'S',
                'file' => '9331994_204d7c1b-771e-499b-9859-38c2c04f881f.jpg',
                'harga' => '200000',
                'kategori' => 'anak-anak',
                'stok' => '5',
            ],
            [   'id_produk' => 'cp001',
                'nama' => 'Kaos Couple Valentine',
                'keterangan' => 'Bahan kain katun',
                'file' => '3135408_d498253b-9814-41c2-a727-71135b5b25ff_1024_768.jpg',
                'ukuran' => 'L',
                'harga' => '74000',
                'kategori' => 'couple',
                'stok' => '178',
            ],
            [   'id_produk' => 'acc001',
                'nama' => 'Kalung Pedang Kiritod',
                'keterangan' => 'Bahan Aluminium',
                'file' => '951428_bf11030d-b0ff-4096-8e64-77421f119d7a_581_581.jpg',
                'ukuran' => 'none',
                'harga' => '25000',
                'kategori' => 'aksesoris',
                'stok' => '67',
            ],
        ]);
    }
}
