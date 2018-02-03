<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    //
    protected $table="kategoris";
    public $primaryKey="id";
    public $timestamps=false;
    public function subkategori1(){
      return $this->hasMany('App\Subkategori1');
    }
    public function subkategori2(){
      return $this->hasMany('App\Subkategori2');
    }
}
