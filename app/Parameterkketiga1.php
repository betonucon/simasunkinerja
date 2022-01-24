<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parameterkketiga1 extends Model
{
    protected $table = 'parameter_kketiga1';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
        'utama',
        'note',


    ];
}
