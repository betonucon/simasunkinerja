<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kkesatu extends Model
{
    protected $table = 'kkesatu';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
        'utama',
        'note',
        'nomor',
        'opd_id',
        'tahun',
        'sampai',
        'ket_sasaran',
        'ket_ik',
        'ket_target',
        'ket_kinerja',
        'ket_data',
        'sts',


    ];
}
