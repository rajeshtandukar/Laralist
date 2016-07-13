<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use File;
use App\Item_Images;

class MediaController extends Controller
{    

    public function upload( Request $request){
        $image = $request->file('file');
        $filename=null;
        if($image->isValid()){
            $extension = $image->getClientOriginalExtension();
            $uploadPath = public_path(). DIRECTORY_SEPARATOR. 'uploads' . DIRECTORY_SEPARATOR;
            $filename = rand(111,999). '.'. $extension;
            $image->move($uploadPath, $filename);   
        }
        //if($request->ajax()){
            return response()->json(array('error' =>0,'file' => $filename));
        //}
        
    }

    public function destroy(  $id ){
        $image = Item_Images::find( $id);
        
        $path = public_path().DIRECTORY_SEPARATOR . 'uploads'.DIRECTORY_SEPARATOR. $image->image;
        
        if( File::delete($path) ){
            $image->delete();
             return response()->json( array('error' => 0));
        }else{
            return response()->json( array('error' => 1));
        }
       
    }

     public function destroyimages($item_id){
        
         Item_Images::where('item_id',$item_id)->each(function($item_image,$key){
              $path = public_path().DIRECTORY_SEPARATOR . 'uploads'.DIRECTORY_SEPARATOR. $item_image->image;        
              File::delete($path);
              $item_image->delete();

         });

         return true;
    }
}
