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
            'cover' => '1.jpg',
            'file_path' => 'Buku Pembangunan Magelang Kota Inda ( The Central of Java ) Dulu dan Sekarang oleh Drs. Sukimin Adi Wiratmoko.pdf',
            'ringkasan' => 'ini adalah ringkasan',
            'penulis' => 'nama penulis',
            'penerbit' => 'nama penerbit',
            'category_id' => '1',
            'jml_halaman' => '52',
            'created_at' => Carbon::now(),
        ]);

        DB::table('books')->insert([
            'id' => '2',
            'user_id' => '1',
            'judul' => 'Contoh buku2',
            'slug' => 'contoh-buku2',
            'cover' => '2.jpg',
            'file_path' => 'Buku Sejarah Perjuangan MASYARAKAT KOTA MAGELANG Dimasa Perjuangan Phisik Tahun 1945 - 1950 Penerbit DHC Angakatan 45 Kota Magelang Tahun 1998.pdf',
            'ringkasan' => 'ini adalah ringkasan',
            'penulis' => 'nama penulis',
            'penerbit' => 'nama penerbit',
            'category_id' => '2',
            'jml_halaman' => '40',
            'created_at' => Carbon::now(),
        ]);

        DB::table('books')->insert([
            'id' => '3',
            'user_id' => '1',
            'judul' => 'Contoh buku3',
            'slug' => 'contoh-buku3',
            'cover' => '3.jpg',
            'file_path' => 'Buku SELAYANG PANDANG KOTAMADYA DATI II MAGELANG TAHUN 1998.pdf',
            'ringkasan' => 'ini adalah ringkasan',
            'penulis' => 'nama penulis',
            'penerbit' => 'nama penerbit',
            'category_id' => '3',
            'jml_halaman' => '42',
            'created_at' => Carbon::now(),
        ]);

        DB::table('books')->insert([
            'id' => '4',
            'user_id' => '1',
            'judul' => 'Contoh buku4',
            'slug' => 'contoh-buku4',
            'cover' => '4.jpg',
            'file_path' => 'Buku Seri Dokumentasi SEJARAH PERKEMBANGAN Nama Jalan di Kota Magelang Tahun 2016 seri ke 2.pdf',
            'ringkasan' => 'ini adalah ringkasan',
            'penulis' => 'nama penulis',
            'penerbit' => 'nama penerbit',
            'category_id' => '4',
            'jml_halaman' => '20',
            'created_at' => Carbon::now(),
        ]);
    }
}
