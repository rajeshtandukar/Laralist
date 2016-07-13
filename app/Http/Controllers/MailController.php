<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Mailtemplate;
use Log;
use Mail;

class MailController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendMail($to,$event,$data)
    {
        $mailtemplate = Mailtemplate::where('event',$event)->get();        
        $body = $mailtemplate[0]->id;
        $subject = $mailtemplate[0]->title;

        Mail::send('mail', ['key' => $body], function($message) use($to,$subject)
        {          
            $message->from('hello@app.com', 'Administrator');
            $message->to($to->email, $to->name)->subject($subject);
        });
        
    }
}
