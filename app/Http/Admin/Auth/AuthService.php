<?php

namespace App\Http\Admin\Auth;

use App\Http\Admin\Auth\AuthRepository;
use App\Notifications\AdminLogInOTP;
use DataTables;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Notifications\AdminPasswordNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\URL;

class AuthService
{
    protected $repository;
    public function __construct(AuthRepository $repository)
    {
        $this->repository = $repository;
    }
    public function register($request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'name' => 'required|string|unique:users',
        ]);
        if ($validator->fails()) {
            return ['msg'=>$validator->messages(),'status'=>403];
        }else{
            $res = $this->repository->storeData($request->all());
            $url = URL::temporarySignedRoute(
                'admin.verify.bycreator', 
                now()->addMinutes(60), 
                ['admin_id' => $res->id]
            );
            Notification::route('mail', 'web.ispacecreation@gmail.com')->notify(new AdminPasswordNotification($url,$request->email));
            return ['msg'=>'Added Successfully!','status'=>200];
        }
    }
    public function sendPasswordResetLink($id)
    {
        $user = $this->repository->getDataWithId($id);
        $status = Password::sendResetLink(
            $user->only('email')
        );
        return $status === Password::RESET_LINK_SENT ? redirect()->route('user.index') : redirect()->back();
    }
    public function passwordUpdate($request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);
     
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                    'role' => 'admin',
                ])->setRememberToken(Str::random(60));
                $user->save();
                event(new PasswordReset($user));
            }
        );
     
        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('admin.login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    }
    public function authenticate($request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::guard('admin')->attempt($credentials)) {
            $sendMail = $this->sendMail($credentials['email']);
            return $sendMail;
        }else{
            return 500;
        }
    }
    public function verifyOtp($request)
    {
        $validator = Validator::make($request->all(), [
            'otp' => 'required|numeric|digits:6', 
        ]);
        if ($validator->fails()) {
            return ['msg'=>$validator->messages(),'status'=>403];
        }else{
            if($request->session()->exists('adminAuthOtp') && $request->otp == session::get('adminAuthOtp')){
                Session::put('adminAuthOtpVerified', true);
                return ['msg'=>'OTP Verified','status'=>200];
            }else{
                return ['msg'=>'Invalid OTP','status'=>400];
            }
        }
    }
    public function logout($request)
    {
        Auth::guard('admin')->logout();
        if($request->session()->exists('adminAuthOtpVerified')){
            $request->session()->forget('adminAuthOtpVerified');
        }
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return 200;
    }
    public function sendMail($email)
    {
        $otp = rand(100000, 999999);
        Session::put('adminAuthOtp', $otp);
        Notification::route('mail', $email)->notify(new AdminLogInOTP($otp,$email));
        return 200;
    }
}
