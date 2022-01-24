<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penilaiankketiga3 extends Model
{
    protected $table = 'penilaian_ketiga3';
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
