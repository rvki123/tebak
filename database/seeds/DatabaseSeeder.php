<?php

use Illuminate\Database\Seeder;
use App\user;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nisn' => '123456678',
            'nama_siswa' => 'admin',
            'role'=>'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
        ]);
    }
}
