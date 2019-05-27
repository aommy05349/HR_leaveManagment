<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Mail\ResetPasswordRequest;
use App\Models\Users;
use Mail;

class ResetPasswordController extends Controller
{
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
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function resetPass(){
        return view('auth.passwords.email');
    }
    public function sendResetLinkEmail(Request $request){
        $reset = $request;
        \Log::info($request);
        Mail::to($request->email)->send(new ResetPasswordRequest($reset)); 
        return redirect('/');
    }
    public function reset(Request $request){
        $reset = Users::where('email','=',$request->email)->first();
        $reset->password = bcrypt($request->password);
        $reset->password_confirmation = bcrypt($request->password);
        \Log::info($request->password);
        $reset->save();
        return redirect('/');
    }
}
