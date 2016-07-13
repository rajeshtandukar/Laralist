<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;
use App\Category;
use App\Country;
use App\Item_Images;
use App\Http\Requests\ItemRequest;
use File;
use Meta;
use Listcurl;

class PostController extends Controller
{    

    public function __construct(){
         
        $this->middleware('auth');
        Meta::meta('title', 'Post Item');
        Meta::meta('description', 'Post classified item');
    }
    /**
     * Show the home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return null;
    }

    public function create(){
        
        $countires = Country::all();
        $Category = new Category;
        $categories = $Category->getCategories();

        return view('frontend.post', compact('countires','categories'));
    }

    public function store( ItemRequest $request ){    

        $item = new Item;
        $item->title = $request['title'];
        $item->alias = str_slug($request['alias']);
        $item->country_id = $request['country_id'];
        $item->category_id = $request['category_id'];
        $item->price = $request['price'];
        $item->description = $request['description'];
        $item->address1 = $request['address1'];
        $item->address2 = $request['address2'];
        $item->address3 = $request['address3'];
        $item->zipcode = $request['zipcode'];
        $item->published = $request['published'];
        $item->user_id = $request->user()->id;

        $country = Country::find($request['country_id']);
        $address  = $request['zipcode'];
        $address .= empty($request['address1']) ? '': ( empty($address)? str_slug($request['address1'],"+"):','.str_slug($request['address1'],"+"));
        $address .= empty($request['address2']) ? '': ( empty($address)? str_slug($request['address2'],"+"):','.str_slug($request['address2'],"+"));
        $address .= empty($request['address3']) ? '': ( empty($address)? str_slug($request['address3'],"+"):','.str_slug($request['address3'],"+"));
        $address .= empty($address) ? $country->country_code : ','.$country->country_code;


        $google_api= 'https://maps.googleapis.com/maps/api/geocode/json?address='.$address.'&key='.config('laralist.google_map_api_key');

        $response = Listcurl::get($google_api);
        $data = json_decode($response);
        if( isset($data->results[0]->geometry->location->lng)){
         $item->lng = $data->results[0]->geometry->location->lng;
        }
      

        if(isset($data->results[0]->geometry->location->lat)){
         $item->lat = $data->results[0]->geometry->location->lat;
        }

        if($request['image']){
             $item->image = $request['image'][0];          
        }

        if( $item->save() ){

            if($request['image']){
                
                $item->image = $request['image'][0];

                foreach ($request['image'] as $image) {
                    $item_image = new Item_Images;
                    $item_image->image = $image;
                    $item_image->item_id = $item->id;
                    $item_image->published = 1;
                    $item_image->save();
                }
            }            
        }
        return redirect()->route('frontend.user.myitems');

    }


    public function edit($id){
        $item = Item::find($id);
        $countires = Country::all();
        
        $Category = new Category;
        $categories = $Category->getCategories();

         $item_image = new Item_Images;
         $images =$item_image->where('item_id' , $item->id)->get();

        return view('frontend.edit', compact('item', 'countires', 'categories', 'images'));

    }

    public function update( ItemRequest $request ){
        $item = Item::find($request['id']);
        $item->title = $request['title'];
        $item->alias = str_slug($request['alias']);
        $item->country_id = $request['country_id'];
        $item->category_id = $request['category_id'];
        $item->price = $request['price'];
        $item->description = $request['description'];
        $item->address1 = $request['address1'];
        $item->address2 = $request['address2'];
        $item->address3 = $request['address3'];
        $item->zipcode = $request['zipcode'];
        $item->published = $request['published'];

        if(!$request['existimage'] && $request['image']){
            
            $item->image = $request['image'][0];          
            
        }else if(!$request['existimage'] && !$request['image']){
            $item->image = '';
        }

        if( $item->save() ){

            if($request['image']){
                
                $item->image = $request['image'][0];

                foreach ($request['image'] as $image) {
                    $item_image = new Item_Images;
                    $item_image->image = $image;
                    $item_image->item_id = $item->id;
                    $item_image->published = 1;
                    $item_image->save();
                }
            }
            
        }

         return redirect()->route('frontend.user.myitems');
        
    }

    public function destrory($id){
        $item = Item::find($id);

        if( $item->delete()) {

            $image = Item_Images::find( $id);

            $path = public_path().DIRECTORY_SEPARATOR . 'uploads'.DIRECTORY_SEPARATOR. $image->image;

            if( File::delete($path) ){
                $image->delete();             
            }
            
        }   

        return redirect()->route('frontend.user.myitems');   

    }

    
}
