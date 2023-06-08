<?php

namespace Database\Seeders;

use App\Models\Ruangan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ruangandata = [
            [
                'nama_ruangan'     => 'Kelas',
            ],
            [
                'nama_ruangan'     => 'Lab',
            ],
            [
                'nama_ruangan'     => 'Logistik',
            ]
        ];

        foreach($ruangandata as $key => $val){
            Ruangan::create($val);
        } 
    }
}
