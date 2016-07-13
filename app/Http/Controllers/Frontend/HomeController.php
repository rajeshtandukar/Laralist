<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use DB;
use Meta;
use Setting;
use Config;

class HomeController extends Controller
{    

    /**
     * Show the home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Category = new Category;
        $allCategories = $Category->getCategories();  
        //Config::write('laralist.item_per_page', 'http://octobercms.com');
        return view('frontend.home', compact('allCategories'));
    }
}