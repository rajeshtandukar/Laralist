<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Country;
use Meta;

class CountryController extends Controller
{
    public function index(){

    	$countries = Country::all();
    	
    	Meta::meta('title', 'Countries');
        Meta::meta('description', 'Classified Country list');
    	return view('frontend.countries',compact('countries'));
    }
    
}
