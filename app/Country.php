<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    
      public function item(){
      	
        return $this->hasMany('Item','country_id');
    }
}
