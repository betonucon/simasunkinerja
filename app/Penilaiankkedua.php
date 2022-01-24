<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penilaiankkedua extends Model
{
    protected $table = 'penilaian_kedua';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'transaksilhe_id',
        'kategori',
        'nilai',
        'jawaban_id',
        'penilaian_id',


    ];
}
