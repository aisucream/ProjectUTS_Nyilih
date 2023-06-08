<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                $barangdata = [
            [
                'id'      => 1,
                'nama_barang'     => 'Kamera',
                'stok'  => 5,
                'kode_ruangan'=> 3,
                'status' => 'Tersedia',
            ],
            [
                'id'      => 2,
                'nama_barang'     => 'Proyektor',
                'stok'  => 20,
                'kode_ruangan'=> 1,
                'status' => 'Tersedia',
            ]
        ];

        foreach($barangdata as $key => $val){
            Barang::create($val);
        }
    }
}
