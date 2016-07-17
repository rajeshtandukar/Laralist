<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

use App\Country;
use Config;


/**
 * Class SettingsdController
 * @package App\Http\Controllers\Backend
 */
class SettingsController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {   
        $countires = Country::all();
        
        //config::get('laralist.item_per_page');
        return view('backend.settings',compact('countires'));
    }


    public function update( Request $request){
                
        Config::write('laralist.site_title', $request['site_title']);
        Config::write('laralist.item_per_page', $request['item_per_page']);
        Config::write('laralist.default_country', $request['default_country']);
        Config::write('laralist.max_image_post', $request['max_image_post']);
        Config::write('laralist.google_map_api_key', $request['google_map_api_key']);
        Config::write('laralist.aws_s3_service', isset($request['aws_s3_service'])? $request['aws_s3_service']:0 );
        Config::write('laralist.aws_s3_bucket', $request['aws_s3_bucket']);
        Config::write('laralist.aws_s3_folder', $request['aws_s3_folder']);
        $response = array('msg' =>'success');
        return response()->json($response); 
    }   

   
}