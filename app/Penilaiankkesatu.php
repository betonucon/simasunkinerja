<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penilaiankkesatu extends Model
{
    protected $table = 'penilaian_kkesatu';
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
