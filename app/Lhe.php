<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lhe extends Model
{
    protected $table = 'lhe';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
        'tanggal',
        'sts',
        'file',
        'nomor',
        'tahun',


    ];
}
