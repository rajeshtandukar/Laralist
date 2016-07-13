<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Item;
use App\User;
use App\Country;
use Carbon\Carbon; 


/**
 * Class DashboardController
 * @package App\Http\Controllers\Backend
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
    	$totalItems = Item::count();
    	$totalUsers = User::count();
    	$recentItems = Item::where('created_at', '>=', Carbon::now()->subWeek())->take(4)->get();
    	$recentUsers = User::where('created_at', '>=', Carbon::now()->subWeek())->take(8)->get();
        $defaultCountry = Country::find(Config('laralist.default_country'));
        

        return view('backend.dashboard', compact('totalItems','totalUsers','recentItems','recentUsers','defaultCountry'));
    }
}