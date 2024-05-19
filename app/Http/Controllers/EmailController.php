<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function isOnline($site = "https://www.linkedin.com"){
        if(@fopen($site,"r")){
            return true;
        }
        else{
            return false;
        }
    }

    public function send(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'subject'=>'required',
            'message'=>'required',
        ]);
        if($this->isOnline()){
            $mail_data=[
                'recipient'=>'hatimabahri9@gmail.com',
                'fromEmail'=>$request->email,
                'fromName'=>$request->name,
                'subject'=>$request->subject,
                'body'=>$request->message,
            ];
            \Mail::send('email-template', $mail_data, function ($message) use ($mail_data) {
                $message->from($mail_data['fromEmail'], $mail_data['fromName']);
                $message->to($mail_data['recipient']);   
                $message->subject($mail_data['subject']);
            });
            return redirect()->back()->withInput()->with('success','email sent!');
        } else {
            return redirect()->back()->withErrors()->withInput()->with('error','Check your connection');
        }
    }


}
