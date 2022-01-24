<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Akses extends Model
{
    protected $table = 'akses';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'username',
        'opd_id',
      ];
    function opd(){
      return $this->belongsTo('App\Opd','opd_id','id');
    }
}
