<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penilaianlhe extends Model
{
    protected $table = 'penilaian_lhe';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'transaksilhe_id',
        'prameter_id',
        'detail_prameter_id',
        'penilaian_id',
        'role_id',
        'nilai',
        'file',
        'jawaban_id',



    ];
}
