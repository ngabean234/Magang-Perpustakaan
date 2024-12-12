<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'id' => '1',
                'name' => 'E-Book Kota Magelang Massa Dulu',
                'slug' => 'ebook-kota-magelang-massa-dulu',
                'photo' => '2.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '2',
                'name' => 'E-Book Kota Magelang Massa Kini',
                'slug' => 'ebook-kota-magelang-massa-kini',
                'photo' => '2.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '3',
                'name' => 'Kliping Kota Magelang',
                'slug' => 'kliping-kota-magelang',
                'photo' => '3.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '4',
                'name' => 'Majalah Kota Magelang',
                'slug' => 'majalah-kota-magelang',
                'photo' => '1.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
