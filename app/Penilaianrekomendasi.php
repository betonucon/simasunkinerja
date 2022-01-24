<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penilaianrekomendasi extends Model
{
    protected $table = 'penilaian_rekomendasi';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'transaksilhe_id',
        'parameter_id',
        'rekomendasi',
        'file',
        'sts',



    ];
}
