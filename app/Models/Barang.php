<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Validation\Rule;
use Laravel\Sanctum\HasApiTokens;

class Barang extends Model
{
    
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'id',
        'nama_barang',
        'stok',
        'kode_ruangan',
        'status',
    ];


    /**
     * Summary of ruangan
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function ruangan(){   
        return $this->belongsTo(Ruangan::class, 'kode_ruangan');
    }

    public function kurangiStok($jumlah){
        
        $this->stok -= $jumlah;
        if ($this->stok <= 0) {
            $this->stok = 0;
            $this->status = 'Habis';
        }
        $this->save();
    }

    public function tambahStok($jumlah){

        $this->stok += $jumlah;
        if ($this->status == 'Habis') {
            $this->status = 'Tersedia';
        }
        $this->save();
    }



}
