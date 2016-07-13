<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
   

    protected $fillable = [
        'title', 'alias', 'category_id', 'country_id', 'published', 'description', 'price', 'user_id', 'created_at',
    ];

    public static function boot() { 

        parent::boot(); 

        parent::observe(new \App\Observers\ItemObserver); 

    }


    public function category(){
    	
    	return $this->belongsTo('App\Category');

    }

    public function country(){
    	
    	return $this->belongsTo('App\Country');

    }

     public function user(){
        
        return $this->belongsTo('App\User');

    }

}
