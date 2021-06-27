<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'role' => 'admin',
                'username' => 'admin',
                'email' => 'admin@admin.com',
                'no_telp' => '08672134123',
                'alamat' => 'Surabaya',
                'password' => Hash::make('admin'),
            ],
            [
                'name' => 'febriansyah',
                'role' => 'user',
                'username' => 'febriansyah',
                'email' => 'febrian@gmail.com',
                'no_telp' => '08921341231',
                'alamat' => 'Surabaya',
                'password' => Hash::make('febriansyah'),
            ]
        ]);
    }
}
