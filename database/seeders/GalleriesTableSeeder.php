<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\CategoryGallery;

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
                'image_path' => 'path/to/default/image.jpg',
                'author' => 'Nama Penulis 1',
                'date_taken' => '2024-11-01', // Tanggal dalam format YYYY-MM-DD
                'location' => 'Lokasi Foto 1',
                'category_gallery_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Judul Foto 2',
                'description' => 'Deskripsi foto 1', // Deskripsi bisa null
                'image_path' => 'path/to/default/image2.jpg',
                'author' => 'Nama Penulis 2',
                'date_taken' => '2024-11-02',
                'location' => 'Lokasi Foto 2',
                'category_gallery_id' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Judul Foto 3',
                'description' => 'Deskripsi foto masa kini',
                'image_path' => 'gallery/3.png',
                'author' => 'Nama Penulis 3',
                'date_taken' => '2024-11-02',
                'location' => 'Lokasi Foto 2',
                'category_gallery_id' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Foto 3',
                'description' => 'Deskripsi foto 3', // Deskripsi bisa null
                'image_path' => 'gallery/3.png',
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
