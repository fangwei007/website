<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

class PasswordController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Password Reset Controller
      |--------------------------------------------------------------------------
      |
      | This controller is responsible for handling password reset requests
      | and uses a simple trait to include this behavior. You're free to
      | explore this trait and override any methods you wish to tweak.
      |
     */

use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest');
        $this->subject = '关于密码重置的链接';
    }

    protected function validateSendResetLinkEmail(Request $request) {
        $this->validate($request, ['email' => 'required|email'], ['email.required' => "请填写有效邮箱。",
            'email.email' => "邮箱格式无效。"]);
    }

    protected function getResetValidationMessages() {
        return [
            'token.required' => "验证失败。",
            'email.required' => "请填写有效邮箱。",
            'email.email' => "邮箱格式无效。",
            'password.required' => "请填写密码。",
            'password.min' => "密码至少6位。",
            'password.confirmed' => "密码输入有误，请重试。",
        ];
    }

}
