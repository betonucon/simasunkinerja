<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    protected $table = 'dokumen';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'tahun',
        'opd_id',
        'file',
        'kategori_id',
        'mulai',
        'batas',
        'waktu',


    ];
}
