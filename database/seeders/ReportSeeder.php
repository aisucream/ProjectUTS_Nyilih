<?php

namespace Database\Seeders;

use App\Models\Report;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $reportData = [
        [ 
            'jenis_report' => 'Bug Aplikasi',
            'keterangan' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ',
            'user_report' => 1
        ],

        [ 
            'jenis_report' => 'Kualitas Barang',
            'keterangan' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ',
            'user_report' => 1
        ],

        ];
        
    foreach($reportData as $key => $val){
        Report::create($val);
    }     
        

    }


}
