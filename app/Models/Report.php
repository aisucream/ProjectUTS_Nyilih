<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

        protected $fillable = [
        'id',
        'jenis_report',
        'keterangan',
        'user_report'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_report');
    }
}
