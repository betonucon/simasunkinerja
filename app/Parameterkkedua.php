<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parameterkkedua extends Model
{
    protected $table = 'parameter_kkedua';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
        'utama',
        'note',


    ];
}
