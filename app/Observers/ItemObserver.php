<?php namespace App\Observers;

use Illuminate\Database\Eloquent\Model as Eloquent;

use Log;

class ItemObserver {

     public function saved($model){

		//Log::info('[Item] Item created!');
		/*$user = app('App\Http\Controllers\Frontend\UserController')->getUser($model->user_id);
		app('App\Http\Controllers\MailController')->sendMail($user, 'onItemSave', $model);*/
     }

     public function deleted($model){

		//Log::info('[Item] Item created!');
		/*$user = app('App\Http\Controllers\Frontend\UserController')->getUser($model->user_id);
		app('App\Http\Controllers\MailController')->sendMail($user, 'onItemSave', $model);*/


		 /*if(!empty($model->image)){
        	 $path = public_path().DIRECTORY_SEPARATOR . 'uploads'.DIRECTORY_SEPARATOR. $model->image;        
        	 File::delete($path);
         }*/

        app('App\Http\Controllers\Frontend\MediaController')->destroyimages($model->id);
     }

    
}