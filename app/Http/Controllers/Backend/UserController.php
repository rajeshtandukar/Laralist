<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

use App\Http\Controllers\Controller;

use App\User;
use Validator;
use DB;
use PDO;

/**
 * Class DashboardController
 * @package App\Http\Controllers\Backend
 */
class UserController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {

        $users = User::all();

        return view('backend.users.users', compact('users'));
    }

    public function create(){ 

        return view('backend.users.create');
    }

    public function store( Request $request ){
        $user = new User;
        $user->name =  $request['name'];
        $user->email =  $request['email'];
        $user->phone =  $request['phone'];
        $user->role =  $request['role'];


        $validator = Validator::make($request->all(), [
         'name' => 'required|max:255',
         'email' => 'required|email|max:255',
         'password' => 'required|confirmed|min:6',
         'password_confirmation' => 'min:6'
        ]);

        if ($validator->fails()) {
             return redirect()->route('admin.users.create')->withErrors($validator)->withInput();
        }

        if(!empty($request['password'])){
            $password = bcrypt($request['password']);
            $user->password = $password;    
        }

        if($user->save())
            $request->session()->flash('alert-success','User added successfully.');
        else
            $request->session()->flash('alert-error','Can not create user now. Plese tyr again!!.');

        
        return redirect()->route('admin.users');
       
    }

    public function edit( $id ){
        $user =User::find($id);
        return view('backend.users.edit', compact('user'));
    }

    public function update( UserRequest $request){
        
        $user = User::find( $request['id'] );

        $hasuser = User::where('email','=',$request['email'])->where('id','!=',$request['id'])->first();
        if($hasuser){
            $request->session()->flash('alert-error','User with given email address already exist. Plese try with another email address!!.');
            return redirect()->route('admin.users'); 
        }
        
        $user->name =  $request['name'];
        $user->email =  $request['email'];
        $user->phone =  $request['phone'];
        $user->role =  $request['role'];

        if(!empty($request['password'])){
            $password = bcrypt($request['password']);
            $user->password = $password;    
        }

        if($user->save())
            $request->session()->flash('alert-success','User updated successfully.');
        else
            $request->session()->flash('alert-error','Can not update User now. Plese tyr again!!.');
        
        return redirect()->route('admin.users');
    }


      public function destroy(Request $request){
         
        $user_id = $request['id'];      
        DB::setFetchMode(PDO::FETCH_ASSOC);

        $users = DB::table('users') 
            ->select('id')             
            ->whereIn('id',$user_id )                     
            ->get();
        
        DB::setFetchMode(PDO::FETCH_CLASS);
        
        User::find($users)->each(function ($user, $key) {
            $user->delete();
        });

        $request->session()->flash('alert-success', count($user_id) . ' User(s) deleted successfully.');

        return redirect()->route('admin.users');

    }
   
}