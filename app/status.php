<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class status extends Model
{
     protected $table = 'status';
   protected $primaryKey = 'id';
   protected $fillable = array(
   	'id',
   'status'
   );

    public function get_status(){
    	return $this->hashMany('App\barang','id','id');
    }
}
