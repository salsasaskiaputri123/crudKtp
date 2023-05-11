<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;
    
    protected $table = 'penduduk';
    protected $fillable = [
        'nik',
        'nama',
        'ttl',
        'jk',
        'alamat',
        'agama',
        'status',
        'pekerjaan',
        'kewarganegaraan'
    ];
}
