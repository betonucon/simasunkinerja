<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parameterkketiga3 extends Model
{
    protected $table = 'parameter_kketiga3';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
        'utama',
        'note',


    ];
}
