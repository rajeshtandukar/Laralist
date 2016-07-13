<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;
use App\Category;
use App\Country;
use App\Item_Images;
use DB;
use App\Http\Requests\ItemRequest;
use App\Http\Requests\UserRequest;
use App\User;


class UserController extends Controller
{    

    public function __construct(){
        
         $this->middleware('auth');
    }
    /**
     * Show the home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('frontend.profile');
    }

    public function items(){
        $user_id = Auth()->user()->id;

        $items = DB::table('items')
                    ->join ('categories' ,'category_id','=','categories.id')
                    ->join ('countries' ,'country_id','=','countries.id')
                    ->select('items.*','categories.title AS category','countries.name AS country')
                    ->where('user_id',$user_id)
                    ->paginate(5);   

        return view('frontend.myitems', compact('items'));
    }

    public function updateProfile(UserRequest $request){
       
        $hasuser = User::where('email','=',$request['email'])->where('id','!=',Auth()->user()->id)->first();
        if($hasuser){
            return redirect()->route('frontend.user.profile');
        }

        $user = Auth()->user();
        $user->name =  $request['name'];
        $user->email =  $request['email'];
        $user->phone =  $request['phone'];
       
         if($request['image']){
             $user->avatar = $request['image'][0];          
        }


        if(!empty($request['password'])){
            $password = bcrypt($request['password']);
            $user->password = $password;    
        }
        if( $user->save()) {
            return redirect()->route('frontend.user.profile');    
        }else{
            return redirect()->route('frontend.user.profile');
        }
        

    }

    public function getUser($user_id){
        return User::find($user_id);
    }


    

    
}
