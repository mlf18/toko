<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subkategori1 extends Model
{
    //
    protected $table="subkategori1s";
    public $primaryKey="id";
    public $timestamps=false;
    public function kategori(){
      return $this->belongsTo('App\Kategori');
    }
    public function subkategori2(){
      return $this->hasMany('App\Subkategori2');
    }
}
