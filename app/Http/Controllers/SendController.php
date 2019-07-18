<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class SendController extends Controller
{
    // Отправка Email
    public function send(Request $request){

        if($request->isMethod('post')){
            $e_messages = [
                'required' => 'Поле :attribute обязательно к заполнению',
                'email' => 'Поле :attribute должно быть email адресом'

            ];
            $k = $this->validate($request, [
                                        'name'=>'required|max:255',
                                        'email'=>'required|email'
                                        ], $e_messages);
            $data = $request->all();
            $result = Mail::send('mail.main', ['data'=>$data], function($message) use ($data){
                $mail_admin = env('MAIL_ADMIN');
                $message->from($data['email'], $data['name']);
                $message->to($mail_admin)->subject('Question');
            });
            if($result){
                return redirect()->route('home')->with('status', 'Email is sand!');
            }
        }
        else{
            return redirect()->route('home')->with('status', 'Error! Email is not sand!');
        }

    }

}
