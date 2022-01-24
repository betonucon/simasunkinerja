<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kketiga3 extends Model
{
    protected $table = 'kketiga3';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
        'utama',
        'note',
        'nomor',
        'opd_id',
        'tahun',
        'ket',
        'sampai',
        'ket_sasaran',
        'ket_ik',
        'ket_target',
        'ket_kinerja',
        'ket_data',
        'sts',


    ];
}
