<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parameterkkesatu extends Model
{
    protected $table = 'parameter_kkesatu';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
        'utama',
        'note',


    ];
}
