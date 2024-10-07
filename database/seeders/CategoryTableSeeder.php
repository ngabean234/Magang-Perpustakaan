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
            'name' => 'E-book',
            'slug' => 'ebook',
            'photo' => 'c1.png'
        ]);

        DB::table('categories')->insert([
            'id' => '2',
            'name' => 'Novel',
            'slug' => 'novel',
            'photo' => 'c2.jpg'
        ]);

        DB::table('categories')->insert([
            'id' => '3',
            'name' => 'Komputer',
            'slug' => 'komputer',
            'photo' => 'c3.jpg'
        ]);

        DB::table('categories')->insert([
            'id' => '4',
            'name' => 'Kamus',
            'slug' => 'kamus',
            'photo' => 'c4.png'
        ]);

        DB::table('categories')->insert([
            'id' => '5',
            'name' => 'Cooking',
            'slug' => 'cooking',
            'photo' => 'c5.jpg'
        ]);

        DB::table('categories')->insert([
            'id' => '6',
            'name' => 'Jurnal',
            'slug' => 'jurnal',
            'photo' => 'c6.png'
        ]);
    }
}
