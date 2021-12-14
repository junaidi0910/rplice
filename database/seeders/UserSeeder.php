<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'username' => 'dosenA',
                'nama' => 'Dosen A',
                'nomor_induk' => 111200,
                'np_hp' => '081315927777',
                'email' => 'dosen@gmail.com',
                'password' => bcrypt(123),
                'role' => 'dosen'
            ],
            [
                'username' => 'jong jek siang',
                'nama' => 'Jong Jek Siang',
                'nomor_induk' => 111201,
                'np_hp' => '081315927711',
                'email' => 'jong@gmail.com',
                'password' => bcrypt(123),
                'role' => 'dosen'
            ],
            [
                'username' => 'katon wijana',
                'nama' => 'Katon Wijana',
                'nomor_induk' => 111202,
                'np_hp' => '082167554411',
                'email' => 'katon@gmail.com',
                'password' => bcrypt(123),
                'role' => 'dosen'
            ],
            [
                'username' => 'mahasiswaA',
                'nama' => 'Mahasiswa A',
                'nomor_induk' => 72190000,
                'np_hp' => '08954121111',
                'email' => 'mahasiswa@gmail.com',
                'password' => bcrypt(123),
                'role' => 'mahasiswa'
            ],
            [
                'username' => 'yudi',
                'nama' => 'I Kadek Yudiantoro',
                'nomor_induk' => 72190277,
                'np_hp' => '081349674254',
                'email' => 'yudi@gmail.com',
                'password' => bcrypt(123),
                'role' => 'mahasiswa'
            ],
            [
                'username' => 'jun',
                'nama' => 'Junaidi',
                'nomor_induk' => 72190322,
                'np_hp' => '082154379452',
                'email' => 'jun@gmail.com',
                'password' => bcrypt(123),
                'role' => 'mahasiswa'
            ],
            [
                'username' => 'eric',
                'nama' => 'Stevanus Erico',
                'nomor_induk' => 72190288,
                'np_hp' => '081349674283',
                'email' => 'eric@gmail.com',
                'password' => bcrypt(123),
                'role' => 'mahasiswa'
            ],
            [
                'username' => 'evan',
                'nama' => 'Evan Leonardo',
                'nomor_induk' => 72190311,
                'np_hp' => '089904562781',
                'email' => 'evan@gmail.com',
                'password' => bcrypt(123),
                'role' => 'mahasiswa'
            ],
            [
                'username' => 'rosa',
                'nama' => 'Rosalia Natasha',
                'nomor_induk' => 72190866,
                'np_hp' => '082145678811',
                'email' => 'rosa@gmail.com',
                'password' => bcrypt(123),
                'role' => 'mahasiswa'
            ],
            [
                'username' => 'dimas',
                'nama' => 'Dimas Gabriel',
                'nomor_induk' => 72190356,
                'np_hp' => '082287563901',
                'email' => 'dimas@gmail.com',
                'password' => bcrypt(123),
                'role' => 'mahasiswa'
            ],
            [
                'username' => 'adminA',
                'nama' => 'Admin A',
                'nomor_induk' => 001,
                'np_hp' => '081345629756',
                'email' => 'ppa@gmail.com',
                'password' => bcrypt(123),
                'role' => 'ppa'
            ],
            [
                'username' => 'adminB',
                'nama' => 'Admin B',
                'nomor_induk' => 002,
                'np_hp' => '081367390346',
                'email' => 'adminb@gmail.com',
                'password' => bcrypt(123),
                'role' => 'ppa'
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
