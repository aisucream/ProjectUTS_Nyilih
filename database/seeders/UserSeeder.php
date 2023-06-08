<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userdata = [
            [
            'name'      => 'Pak Eka',
            'email'     => 'eka@gmail.com',
            'password'  => bcrypt('admin'),
            'level'     => 'admin'
            ],
            [
            'name'      => 'Arcadius Obaja',
            'email'     => 'arcadiusobaja@gmail.com',
            'password'  => bcrypt('user'),
            'level'     => 'mahasiswa'
            ]
        ];

        foreach($userdata as $key => $val){
            User::create($val);
        }
    }
}
