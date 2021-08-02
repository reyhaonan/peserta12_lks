<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'AdminJago',
            'email' => 'admin@admin.com',
            'password' => Hash::make('passwordpanjang'),
            'role' => 'admin'
        ]);

        Kategori::create([
            'nama' => 'IPhone',
            'foto' => '#'
        ]);

        Produk::create([
            'nama_produk' => 'Iphone 11',
            'foto_produk' => '%',
            'kategori_id' => 1,
            'harga' => 8000000,
            'deskripsi' => 'Lorem ipsum dolor sit amet',
        ]);
    }
}
