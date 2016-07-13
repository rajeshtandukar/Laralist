<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Item;
use DB;



class Category extends Model
{

     public static function boot() { 

        parent::boot(); 

        parent::observe(new \App\Observers\CategoryObserver); 

    }

    public function item(){
        return $this->hasMany('Item','category_id');
    }

    public function children()
    {
        return $this->hasMany('App\Category', 'parent_id');
    }


    public function getCategories(){
    	$categoires = Category::where('parent_id',0)->get();
    	$categoires = $this->addRelation($categoires);
    	return $categoires;
    }

    public function selectChild( $id ){
    	$categoires = Category::where('parent_id',$id)->get();
    	$categoires = $this->addRelation($categoires);    	
    	return $categoires;
    }

    public function addRelation( $categoires ){
        
    	$categoires->map(function( $item, $key){    		
    		
    		$sub = $this->selectChild($item->id); 

    		$item->itemCount = $this->getItemCount($item->id , $item->parent_id );
            
    		return $item = array_add($item, 'subCategory', $sub);
    	});
       
    	return $categoires;
    }

    public function getItemCount( $category_id, $parent_id ){
       
        if( $parent_id == 0){ // for root-caregory

             $ids = Category::select('id')->where('parent_id', $category_id)->get();
             $array = array();

             foreach ($ids as $id) {            
                $array[] =  $id->id;
             }  
            
             return Item::whereIn('category_id', $array )->count();                        
             

        }else{

            return Item::where('category_id', $category_id)->count();
        }

    }
}
