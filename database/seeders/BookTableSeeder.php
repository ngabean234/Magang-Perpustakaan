<?php
namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            'id' => '1',
            'user_id' => '1',
            'judul' => 'Contoh buku1',
            'slug' => 'contoh-buku1',
            'cover' => 'cover1.png',
            'embed' => 'https://online.anyflip.com/tegcn/ldgs/index.html',
            'ringkasan' => 'ini adalah ringkasan',
            'penulis' => 'nama penulis',
            'penerbit' => 'nama penerbit',
            'category_id' => '1',
            'jml_halaman' => '250',
            'created_at' => Carbon::now(),
        ]);

        DB::table('books')->insert([
            'id' => '2',
            'user_id' => '1',
            'judul' => 'Contoh buku2',
            'slug' => 'contoh-buku2',
            'cover' => 'cover1.png',
            'embed' => 'https://online.anyflip.com/tegcn/ldgs/index.html',
            'ringkasan' => 'ini adalah ringkasan',
            'penulis' => 'nama penulis',
            'penerbit' => 'nama penerbit',
            'category_id' => '2',
            'jml_halaman' => '250',
            'created_at' => Carbon::now(),
        ]);

        DB::table('books')->insert([
            'id' => '3',
            'user_id' => '1',
            'judul' => 'Contoh buku3',
            'slug' => 'contoh-buku3',
            'cover' => 'cover1.png',
            'embed' => 'https://online.anyflip.com/tegcn/ldgs/index.html',
            'ringkasan' => 'ini adalah ringkasan',
            'penulis' => 'nama penulis',
            'penerbit' => 'nama penerbit',
            'category_id' => '3',
            'jml_halaman' => '250',
            'created_at' => Carbon::now(),
        ]);

        DB::table('books')->insert([
            'id' => '4',
            'user_id' => '1',
            'judul' => 'Contoh buku4',
            'slug' => 'contoh-buku4',
            'cover' => 'cover1.png',
            'embed' => 'https://online.anyflip.com/tegcn/ldgs/index.html',
            'ringkasan' => 'ini adalah ringkasan',
            'penulis' => 'nama penulis',
            'penerbit' => 'nama penerbit',
            'category_id' => '4',
            'jml_halaman' => '250',
            'created_at' => Carbon::now(),
        ]);

        DB::table('books')->insert([
            'id' => '5',
            'user_id' => '1',
            'judul' => 'Contoh buku5',
            'slug' => 'contoh-buku5',
            'cover' => 'cover1.png',
            'embed' => 'https://online.anyflip.com/tegcn/ldgs/index.html',
            'ringkasan' => 'ini adalah ringkasan',
            'penulis' => 'nama penulis',
            'penerbit' => 'nama penerbit',
            'category_id' => '5',
            'jml_halaman' => '250',
            'created_at' => Carbon::now(),
        ]);
        
        DB::table('books')->insert([
            'id' => '6',
            'user_id' => '1',
            'judul' => 'Contoh buku6',
            'slug' => 'contoh-buku6',
            'cover' => 'cover1.png',
            'embed' => 'https://online.anyflip.com/tegcn/ldgs/index.html',
            'ringkasan' => 'ini adalah ringkasan',
            'penulis' => 'nama penulis',
            'penerbit' => 'nama penerbit',
            'category_id' => '6',
            'jml_halaman' => '250',
            'created_at' => Carbon::now(),
        ]);

        DB::table('books')->insert([
            'id' => '7',
            'user_id' => '1',
            'judul' => 'Contoh buku7',
            'slug' => 'contoh-buku7',
            'cover' => 'cover1.png',
            'embed' => 'https://online.anyflip.com/tegcn/ldgs/index.html',
            'ringkasan' => 'ini adalah ringkasan',
            'penulis' => 'nama penulis',
            'penerbit' => 'nama penerbit',
            'category_id' => '1',
            'jml_halaman' => '250',
            'created_at' => Carbon::now(),
        ]);

        DB::table('books')->insert([
            'id' => '8',
            'user_id' => '1',
            'judul' => 'Contoh buku8',
            'slug' => 'contoh-buku8',
            'cover' => 'cover1.png',
            'embed' => 'https://online.anyflip.com/tegcn/ldgs/index.html',
            'ringkasan' => 'ini adalah ringkasan',
            'penulis' => 'nama penulis',
            'penerbit' => 'nama penerbit',
            'category_id' => '1',
            'jml_halaman' => '250',
            'created_at' => Carbon::now(),
        ]);

    }
}
