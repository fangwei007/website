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
        $this->middleware('admin', ['except' => [ 'store']]);
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
                        'contact-name.required' => "请填写姓名。",
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
                    'message' => nl2br($request->input('contact-message')),
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
    
    public function msgManage() {
        $msgs = Message::all();
        return view('admin.msg-manage', ['msgs' => $msgs]);
    }
    
    public function viewMsg($id) {
        $msg = Message::where('id', $id)->first();
        return view('admin.msg', ['msg' => $msg]);
    }
    
    public function readMsg(Request $request, $id) {
        $validator = Validator::make($request->all(), [
                    'status' => "required",
                        ], [
                    'status.required' => "请标记状态。",
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $data = [
                'status' => $request->input('status')
            ];

            Message::where('id', $id)->update($data);
            // redirect
            if ($request->input('status') == 'C') Session::flash('message', "已处理一个留言。");
            else Session::flash('message', "留言标记为未读。");
            return redirect('/msg-manage');
        }
    }
    
    public function destroy($id) {
        $delete_msg = Message::where('id', $id)->first();
        if ($delete_msg != NULL) {
            Session::flash('message', "已删除");
            Session::flash('name', $delete_msg->name);
            $delete_msg->delete();
            return redirect("/msg-manage");
        }

        return view("errors.404");
    }
    
    public function restore($id) {
        $removed_msg = Message::onlyTrashed()->where('id', $id)->first();
        if ($removed_msg != NULL) {
            Session::flash('message', "已还原留言");
            Session::flash('name', $removed_msg->name);
            $removed_msg->restore();
            return redirect()->back();
        }

        return view("errors.404");
    }

}
