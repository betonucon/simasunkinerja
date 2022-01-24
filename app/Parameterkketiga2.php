<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parameterkketiga2 extends Model
{
    protected $table = 'parameter_kketiga2';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
        'utama',
        'note',


    ];
}
