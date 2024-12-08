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
                'title' => 'Foto 1',
                'description' => 'Deskripsi foto 1',
                'image_path' => 'path/to/default/1.jpg',
                'author' => 'Penulis 1',
                'date_taken' => '2024-11-01', // Tanggal dalam format YYYY-MM-DD
                'location' => 'Lokasi Foto 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Foto 2',
                'description' => 'Deskripsi foto 2', // Deskripsi bisa null
                'image_path' => 'path/to/default/2.jpg',
                'author' => 'Penulis 2',
                'date_taken' => '2024-11-02',
                'location' => 'Lokasi Foto 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Foto 3',
                'description' => 'Deskripsi foto 3', // Deskripsi bisa null
                'image_path' => 'path/to/default/3.jpg',
                'author' => 'Penulis 3',
                'date_taken' => '2024-11-02',
                'location' => 'Lokasi Foto 3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan lebih banyak data jika diperlukan
        ]);
    }
}
