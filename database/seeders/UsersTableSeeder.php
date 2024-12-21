<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role_id' => '1',
            'umur' => '24',
            'password' => bcrypt('12345678'),
        ]);

        DB::table('users')->insert([
            'name' => 'Perpustakaan',
            'email' => 'perpus@gmail.com',
            'role_id' => '2',
            'jk' => 'L',
            'umur' => '20',
            'password' => bcrypt('12345678'),
        ]);
    }
}
