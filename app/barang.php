<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    protected $table = 'barang';
   protected $primaryKey = 'id';
   protected $fillable = array(
   	'id',
   	'nama_barang',
   	'harga',
    'tanggal',
   	'status',
    'created_at',
    'updated_at'
   );
     public function get_status(){
    return $this->belongsTo('\App\status','status','id');
   }
}
