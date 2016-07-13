<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MailtemplateTableSeeder extends Seeder{

	public function run(){
		  $created_at = \Carbon\Carbon::now()->toDateTimeString();
		  
		   DB::table('mailtemplates')->insert(array(
		   		array('title' =>'On Create New Item' , 'event'=>'onAdSave','body'=>'Hello Dear, Welcome','created_at' => $created_at)		   		
		   	));
	}

}