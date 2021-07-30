<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    	public function hotel()
  {
   		 return $this->belongsTo('App\Hotel','hotel_id');
  }
  	public function clinique()
  {
   		 return $this->belongsTo('App\Clinique','clinique_id');
  }
  
  public function chirurgiens()
    {
        return $this->belongsToMany('App\Chirurgien')->withTimestamps();
    }
}
