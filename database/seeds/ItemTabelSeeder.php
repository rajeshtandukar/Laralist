<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemTableSeeder extends Seeder{

	public function run(){
		  $created_at = \Carbon\Carbon::now()->toDateTimeString();
		  
		   DB::table('items')->insert(array(
		   		array('title' =>'Toyota Pickup Truck' , 'alias'=>'toyota-pickup-truck','category_id'=>2,'country_id'=>1,'published'=>1,'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mattis quam mauris, a consectetur enim dapibus a. In ullamcorper luctus feugiat. Ut velit libero, rhoncus eget fermentum ac, finibus non lorem. Sed id lectus elit.' ,'price'=>250, 'user_id'=>1,'created_at' => $created_at),
		   		array('title' =>'Farari' , 'alias'=>'farari','category_id'=>2,'country_id'=>1,'published'=>1,'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mattis quam mauris, a consectetur enim dapibus a. In ullamcorper luctus feugiat. Ut velit libero, rhoncus eget fermentum ac, finibus non lorem. Sed id lectus elit.' ,'price'=>2000, 'user_id'=>1,'created_at' => $created_at),
		   		array('title' =>'Mobile Computer' , 'alias'=>'mobile-computer','category_id'=>57,'country_id'=>10,'published'=>1,'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mattis quam mauris, a consectetur enim dapibus a. In ullamcorper luctus feugiat. Ut velit libero, rhoncus eget fermentum ac, finibus non lorem. Sed id lectus elit.' ,'price'=>50, 'user_id'=>1,'created_at' => $created_at),
		   		array('title' =>'Freezer' , 'alias'=>'freezer','category_id'=>11,'country_id'=>5,'published'=>1,'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mattis quam mauris, a consectetur enim dapibus a. In ullamcorper luctus feugiat. Ut velit libero, rhoncus eget fermentum ac, finibus non lorem. Sed id lectus elit.' ,'price'=>550, 'user_id'=>1,'created_at' => $created_at),
		   		array('title' =>'Appliances' , 'alias'=>'appliances','category_id'=>11,'country_id'=>5,'published'=>1,'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mattis quam mauris, a consectetur enim dapibus a. In ullamcorper luctus feugiat. Ut velit libero, rhoncus eget fermentum ac, finibus non lorem. Sed id lectus elit.' ,'price'=>470, 'user_id'=>1,'created_at' => $created_at),
		   		array('title' =>'Labardoodles' , 'alias'=>'labardoodles','category_id'=>50,'country_id'=>15,'published'=>1,'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mattis quam mauris, a consectetur enim dapibus a. In ullamcorper luctus feugiat. Ut velit libero, rhoncus eget fermentum ac, finibus non lorem. Sed id lectus elit.' ,'price'=>400, 'user_id'=>1,'created_at' => $created_at),
		   		array('title' =>'Australian Shepherd' , 'alias'=>'australian-shepherd','category_id'=>50,'country_id'=>15,'published'=>1,'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mattis quam mauris, a consectetur enim dapibus a. In ullamcorper luctus feugiat. Ut velit libero, rhoncus eget fermentum ac, finibus non lorem. Sed id lectus elit.' ,'price'=>350, 'user_id'=>1,'created_at' => $created_at),
		   		array('title' =>'Furnished Ac Flats' , 'alias'=>'furnished-ac-flats','category_id'=>26,'country_id'=>15,'published'=>1,'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mattis quam mauris, a consectetur enim dapibus a. In ullamcorper luctus feugiat. Ut velit libero, rhoncus eget fermentum ac, finibus non lorem. Sed id lectus elit.' ,'price'=>14000, 'user_id'=>1,'created_at' => $created_at),
		   		array('title' =>'Marathalli serviced apartments' , 'alias'=>'marathalli-serviced-apartments','category_id'=>26,'country_id'=>15,'published'=>1,'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mattis quam mauris, a consectetur enim dapibus a. In ullamcorper luctus feugiat. Ut velit libero, rhoncus eget fermentum ac, finibus non lorem. Sed id lectus elit.' ,'price'=>22000, 'user_id'=>1,'created_at' => $created_at),
		   		array('title' =>'Programming Experts' , 'alias'=>'programming-experts','category_id'=>39,'country_id'=>15,'published'=>1,'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mattis quam mauris, a consectetur enim dapibus a. In ullamcorper luctus feugiat. Ut velit libero, rhoncus eget fermentum ac, finibus non lorem. Sed id lectus elit.' ,'price'=>10000, 'user_id'=>1,'created_at' => $created_at),
		   		array('title' =>'Composite Process Engineer' , 'alias'=>'composite-process-engineer','category_id'=>35,'country_id'=>11,'published'=>1,'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mattis quam mauris, a consectetur enim dapibus a. In ullamcorper luctus feugiat. Ut velit libero, rhoncus eget fermentum ac, finibus non lorem. Sed id lectus elit.' ,'price'=>10000, 'user_id'=>1,'created_at' => $created_at),
		   		array('title' =>'Laraevl Developer' , 'alias'=>'laraevl-developer','category_id'=>35,'country_id'=>25,'published'=>1,'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mattis quam mauris, a consectetur enim dapibus a. In ullamcorper luctus feugiat. Ut velit libero, rhoncus eget fermentum ac, finibus non lorem. Sed id lectus elit.' ,'price'=>10000, 'user_id'=>1,'created_at' => $created_at),

		   	));
	}

}