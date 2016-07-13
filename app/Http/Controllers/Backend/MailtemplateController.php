<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\MailtemplateRequest;

use App\Http\Controllers\Controller;

use App\Mailtemplate;
use DB;

class MailtemplateController extends Controller
{
   
    public $events = null;

    public function __construct(){
        $this->events = array(
             'onItemSave' =>'New Item Created',   
             'onItemModify' =>'Item Modified',   
             'onItemDelete' =>'Item Deleted',   
             'onUserCrete' =>'New User Registered',   
             'onContacAdmin' =>'Contact Administrator',   
             'onConcatItemPoster' =>'Contact Item Owner'             
            );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            

          $templates = Mailtemplate::all(); 
          $events = $this->events;  
          return view('backend.mailtemplate.templates', compact('templates','events'));
        
    }

    public function create(){
        $events = $this->events;  
        return view('backend.mailtemplate.create', compact('events'));
    }

    public function store( MailtemplateRequest $request ){

        $mailtemplate = new Mailtemplate;
        $mailtemplate->title = $request['title'];                
        $mailtemplate->event = $request['event'];
        $mailtemplate->body = $request['body'];       
        $mailtemplate->published = $request['published'];        
        

        if($mailtemplate->save())
            $request->session()->flash('alert-success','Mailtemplate added successfully.');
        else
            $request->session()->flash('alert-error','Can not add Mailtemplate now. Plese tyr again!!.');

        
        return redirect()->route('admin.mailtemplates');
       
    }


    public function edit( $id ){
        $mailtemplate =Mailtemplate::find($id);
        $events = $this->events;  
       
        return view('backend.mailtemplate.edit', compact('mailtemplate', 'events'));
    }


     public function update( MailtemplateRequest $request){
        
        $mailtemplate = Mailtemplate::find( $request['id'] );  

        $mailtemplate->title = $request['title'];                
        $mailtemplate->event = $request['event'];
        $mailtemplate->body = $request['body'];       
        $mailtemplate->published = $request['published'];     
        

        if($mailtemplate->save())
            $request->session()->flash('alert-success','Mailtemplate updated successfully.');
        else
            $request->session()->flash('alert-error','Can not update Mailtemplate now. Plese tyr again!!.');
        

        return redirect()->route('admin.mailtemplates');
    }

    public function publish(Request $request){

        Mailtemplate::whereIn('id',$request['id'])->update(['published' => 1]);
        $request->session()->flash('alert-success', count($request['id']). " Mail Template(s) Published ");   
        return redirect()->route('admin.mailtemplates');
    }

    public function unpublish(Request $request){
     
        Mailtemplate::whereIn('id',$request['id'])->update(['published' => 0]);   
        $request->session()->flash('alert-success', count($request['id']). " Mail Template(s) Unpublished ");         
        return redirect()->route('admin.mailtemplates');
    }

    public function destroy(Request $request){
     
      $templates_id = $request['id'];      
      Mailtemplate::find($templates_id)->each(function ($template, $key) {
            $template->delete();
      });
      
      $request->session()->flash('alert-success',count($templates_id) .' Templates(s) deleted successfully.');
      
      return redirect()->route('admin.mailtemplates');

    }
}