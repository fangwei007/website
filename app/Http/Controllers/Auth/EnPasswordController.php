<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

class EnPasswordController extends Controller {
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
        $this->subject = 'Links for resetting password';
    }

    protected function validateSendResetLinkEmail(Request $request) {
        $this->validate($request, ['email' => 'required|email'], ['email.required' => "Valid email required.",
            'email.email' => "Invalid email address."]);
    }

    protected function getResetValidationMessages() {
        return [
            'token.required' => "Invalid request.",
            'email.required' => "Valid email required.",
            'email.email' => "Invalid email address.",
            'password.required' => "Enter password.",
            'password.min' => "Password must be at least 6 characters.",
            'password.confirmed' => "Password not matched, please enter again.",
        ];
    }

    protected function getSendResetLinkEmailSuccessResponse($response) {
        return redirect()->back()->with('status', "Link for resetting password has been sent to your email.");
    }

    protected function getSendResetLinkEmailFailureResponse($response) {
        return redirect()->back()->withErrors(['email' => "Invalid email address."]);
    }

}
