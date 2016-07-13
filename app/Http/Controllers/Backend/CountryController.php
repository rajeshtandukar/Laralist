<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\CountryRequest;

use App\Http\Controllers\Controller;

use App\Country;
use DB;
use PDO;

/**
 * Class DashboardController
 * @package App\Http\Controllers\Backend
 */
class CountryController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
    	$countries =Country::all();
       
        return view('backend.countries.countries', array('countries' =>$countries));
    }

    public function create(){
       
        return view('backend.countries.create');
    }

    public function store( CountryRequest $request ){

        $item = new Country;
        $country->name = $request['name'];              
        $country->country_code = $request['country_code'];
        $country->currency = $request['currency'];
        $country->symbol = $request['symbol'];       
        $country->published = $request['published'];
        

        if($country->save())
            $request->session()->flash('alert-success','Country added successfully.');
        else
            $request->session()->flash('alert-error','Can not add Country now. Plese tyr again!!.');

        return redirect()->route('admin.countries');
       
    }

    public function edit( $id ){    
        $country =Country::find($id);
        return view('backend.countries.edit', array('country' => $country));
    }

    public function update( CountryRequest $request){
        
        $country = Country::find( $request['id'] );

        $country->name = $request['name'];              
        $country->country_code = $request['country_code'];
        $country->currency = $request['currency'];
        $country->symbol = $request['symbol'];       
        $country->published = $request['published'];
        
         if($country->save())
            $request->session()->flash('alert-success','Country saved successfully.');
        else
            $request->session()->flash('alert-error','Can not saved Country now. Plese tyr again!!.');

        return redirect()->route('admin.countries');
    }


  public function publish(Request $request){

        Country::whereIn('id',$request['id'])->update(['published' => 1]);
        $count = count($request['id']);
        $message =  $count . ( ($count > 1)? ' Countries Published':' Country Published');
        $request->session()->flash('alert-success', $message); 

        return redirect()->route('admin.countries');
        
    }

    public function unpublish(Request $request){
     
        Country::whereIn('id',$request['id'])->update(['published' => 0]); 
        $count = count($request['id']);
        $message =  $count . ( ($count > 1)? ' Countries Unpublished':' Country Unpublished');
        $request->session()->flash('alert-success', $message);              
        return redirect()->route('admin.countries');
    }

    public function destroy(Request $request){
         
      $countries_id = $request['id'];
      DB::setFetchMode(PDO::FETCH_ASSOC);

        $countries = DB::table('countries') 
            ->select('id')             
            ->whereIn('id',$countries_id )
            ->get();
           
        DB::setFetchMode(PDO::FETCH_CLASS);
        
        Country::find($countries)->each(function ($country, $key) {
            $country->delete();
        });
        $count = count($countries_id);
        $message =  $count . ( ($count > 1)? ' Countries deleted':' Country deleted');

        $request->session()->flash('alert-success',$message);
        return redirect()->route('admin.categories');

    }
   
}