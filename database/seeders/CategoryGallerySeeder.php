<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryGallerySeeder extends Seeder
{
    public function run()
    {
        DB::table('category_galleries')->insert([
            [
                'id' => '1',
                'name' => 'Foto Masa Dulu',
                'slug' => 'foto-masa-dulu',
                'photo' => '1.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '2',
                'name' => 'Foto Masa Kini',
                'slug' => 'foto-masa-kini',
                'photo' => '3.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
