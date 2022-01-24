<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    protected $table = 'penilaian';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'detail_parameter_id',
        'name',
        'nilai',
        'utama',
        'note',


    ];
}
