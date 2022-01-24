<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penilaiankketiga2 extends Model
{
    protected $table = 'penilaian_ketiga2';
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
