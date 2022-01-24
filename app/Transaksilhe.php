<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksilhe extends Model
{
    protected $table = 'transaksilhe';
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

    function opd(){
        return $this->belongsTo('App\Opd','opd_id','id');
      }
}
