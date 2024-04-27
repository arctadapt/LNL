<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Izin extends Model
{
    use HasFactory;
    protected $fillable = [
        'siswa_id',
        'alasan',
        'mapel',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

}
