<?php namespace App\Observers;

use Illuminate\Database\Eloquent\Model as Eloquent;

//use Log;
use File;

class CategoryObserver {

     /*public function saved($model){

        Log::info('Category created!');
     }  */

      public function deleted( $model){

        if(!empty($model->logo)){
        	 $path = public_path().DIRECTORY_SEPARATOR . 'uploads'.DIRECTORY_SEPARATOR. $model->logo;        
        	 File::delete($path);
        }
     }      
}