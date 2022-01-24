<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksikkesatu extends Model
{
    protected $table = 'transaksikkesatu';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
        'tanggal',
        'sts',
        'file',
        'nomor',
        'tahun',
        'opd_id',


    ];
}
