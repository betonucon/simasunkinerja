<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $table = 'jawaban';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
        'nilai',
        'sts',



    ];
}
