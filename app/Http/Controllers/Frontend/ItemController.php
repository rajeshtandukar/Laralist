<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\ItemRequest;

use App\Http\Controllers\Controller;
use App\Item;
use App\Category;
use App\Country;
use App\Item_Images;

use DB;
use Meta;

class ItemController extends Controller
{    
   
    /**
     * Show the home page.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function show($id)
    {
        $item =  Item::find($id);

        if($item){
            
            $item->views = (int) $item->views +1;
            $item->save();
        }

        $category = Category::find($item->category_id);
        if($category->parent_id == 0){
             
             $ids = Category::select('id')->where('parent_id', $item->category_id)->where('parent_id','!=',0)->get();
             $array = array();

             foreach ($ids as $id) {            
                $array[] = (int) $id->id;
             }                
             $items = Item::select('*')->whereIn('category_id',$array)->whereNotIn('id', [$item->id])->get();  

        }else{
            
            $items =  Item::select('*')->where('category_id' ,$item->category_id)->whereNotIn('id', [$item->id])->get();    
        }

        $item_images = Item_Images::where('item_id',$id)->get();
        Meta::meta('title', $item->title);
        Meta::meta('description', $item->description);
        $defaultCountry = Country::find(Config('laralist.default_country'));

        return view('frontend.item', compact('item','items','item_images','defaultCountry'));       
    }

   public function search(Request $request){

        $searchText = $request['q'];
        $seachLocation = $request['l'];

        
        $columns =['alias','description','address1','address2','address3'];
      
        $query = Item::select('*');
        
        $query->where( 'title', 'like', '%'.$searchText.'%');

        foreach( $columns as $column)
        {
            $query->orWhere( $column, 'like', '%'.$searchText.'%');
        }

        
        $query->orWhereHas('category',function( $query ) use (  $searchText ){
            $query->where('title', 'like', '%'.$searchText.'%' );
            
        });

         $query->orWhereHas('country',function( $query ) use (  $searchText ){
            $query->where('name', 'like', '%'.$searchText.'%' );
            
        });
        
        $items = $query->paginate(5);
        $searchQuery = $searchText;

        //var_dump( $query->toSql() );
        //echo "<pre>";
        //print_r($datas);

       return view('frontend.search', compact('items','searchQuery','seachLocation'));  



    }

    public function sendmessage(){
        
    }



}
