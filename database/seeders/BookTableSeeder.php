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
            'cover' => '1.jpeg',
            'file_path' => '21.0504.0044_Mohammad Veri irawan_E-Book Arsikom.pdf',
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
            'cover' => '2.png',
            'file_path' => 'Buku Dokumentasi Sejarah Kota Magelang Tahun 2013.pdf',
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
            'cover' => 'depan.jpg',
            'file_path' => 'Buku Pembangunan Magelang Kota Inda ( The Central of Java ) Dulu dan Sekarang oleh Drs. Sukimin Adi Wiratmoko.pdf',
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
            'cover' => 'Logo_Perpus.jpg',
            'file_path' => 'Buku Perjuangan Magelang dengan Putra Putri Pengalaman Pribadi oleh Drs. Soekimin Adi Wiratmoko.pdf',
            'ringkasan' => 'ini adalah ringkasan',
            'penulis' => 'nama penulis',
            'penerbit' => 'nama penerbit',
            'category_id' => '4',
            'jml_halaman' => '250',
            'created_at' => Carbon::now(),
        ]);

    }
}
