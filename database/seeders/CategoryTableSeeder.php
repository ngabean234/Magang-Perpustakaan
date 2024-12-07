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
            'id' => '1',
            'name' => 'E-Book Kota Magelang Massa Dulu',
            'slug' => 'ebook',
            'photo' => '2.png'
        ]);

        DB::table('categories')->insert([
            'id' => '2',
            'name' => 'E-Book Kota Magelang Massa Kini',
            'slug' => 'ebook',
            'photo' => '2.png'
        ]);

        DB::table('categories')->insert([
            'id' => '3',
            'name' => 'Kliping Kota Magelang',
            'slug' => 'Kliping',
            'photo' => '3.png'
        ]);

        DB::table('categories')->insert([
            'id' => '4',
            'name' => 'Majalah Kota Magelang',
            'slug' => 'Majalah',
            'photo' => '1.png'
        ]);
    }
}
