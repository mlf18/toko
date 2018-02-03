<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    //
    protected $table="barangs";
    public $primaryKey="id";
    public $timestamps=true;
    public function subkategori2s(){
      return $this->belongsTo('App\Subkategori2');
    }
}
