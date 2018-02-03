<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subkategori2 extends Model
{
    //
    protected $table="subkategori2s";
    public $primaryKey="id";
    public $timestamps=false;
    public function subkategori1s(){
      return $this->belongsTo('App\Subkategori1');
    }
    public function kategori(){
      return $this->belongsTo('App\Kategori');
    }
    public function barangs(){
      return $this->hasMany('App\Barang');
    }
}
