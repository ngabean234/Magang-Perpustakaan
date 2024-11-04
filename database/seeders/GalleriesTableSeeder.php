<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GalleriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('galleries')->insert([
            [
                'title' => 'Judul Foto 1',
                'description' => 'Deskripsi foto 1',
                'image_path' => null,
                'author' => 'Nama Penulis 1',
                'date_taken' => '2024-11-01', // Tanggal dalam format YYYY-MM-DD
                'location' => 'Lokasi Foto 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Judul Foto 2',
                'description' => null, // Deskripsi bisa null
                'image_path' => null,
                'author' => 'Nama Penulis 2',
                'date_taken' => '2024-11-02',
                'location' => 'Lokasi Foto 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan lebih banyak data jika diperlukan
        ]);
    }
}
