<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class log extends Model
{
      protected $table = 'log_barang';
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
