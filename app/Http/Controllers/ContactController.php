<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Message;
use Validator;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        
    }

    public function store(Request $request) {
        $message = $request->cookie("message");
        if (empty($message)) {
            $validator = Validator::make($request->all(), [
                        'contact-name' => "required",
                        'contact-phone' => "required",
                        'contact-email' => "required|email",
                        'contact-message' => "required",
                            ], [
                        'contact-name.required' => "请填写用户名。",
                        'contact-phone.required' => "请填写联系电话。",
                        'contact-email.required' => "请填写有效邮箱。",
                        'contact-email.email' => "邮箱格式无效。",
                        'contact-message.required' => "请填写留言。",
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                $data = [
                    'name' => $request->input('contact-name'),
                    'phone' => $request->input('contact-phone'),
                    'email' => $request->input('contact-email'),
                    'message' => $request->input('contact-message'),
                ];

                Message::create($data);
                $cookie = cookie('message', TRUE, 5);
                Session::flash('contact-message', "留言已发送。");
                return redirect('/contact')->withCookie($cookie);
            }
        } else {
            Session::flash('contact-message', "留意已发送，请稍后再试。");
            return redirect('/contact');
        }
    }

}
