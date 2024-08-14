<?php

namespace App\Http\User\Auth;

use App\Http\User\Auth\AuthRepository;
use App\Notifications\AdminLogInOTP;
use DataTables;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Notifications\AdminPasswordNotification;
use App\Notifications\UserPasswordResetMail;
use Illuminate\Auth\Passwords\TokenRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Image;

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
            'name'=>'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|numeric|unique:alumni_details,phone',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
            'course.*' =>   'required',
            'institution.*' =>   'required',
            'in_fr.*' =>   'required',
            'in_to.*' =>   'required',
            'designation.*' =>   'required',
            'company.*' =>   'required',
            'comp_from.*' =>   'required',
            'comp_to.*' =>   'required',
            'dob' => 'required|date',
            'batch' => 'required|numeric|min:2000|max:2024',
            'from' => 'required|date',
            'to' => 'required|date|after_or_equal:from',
            'password'=>'required|confirmed',
        ]);
            if ($validator->fails()) {
                return ['msg'=>$validator->messages()->first(),'status'=>403];
            }else{
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/images/profile', $imageName);
                $res = $this->repository->storeData($request,$imageName);
                if($res){
                    return ['msg'=>'Successfully Stored','status'=>200];
                }else{
                    return ['msg'=>'Sorry, Something went wrong!','status'=>500];
                }
        }
    }
    public function sendPasswordResetLink($email)
    {
        $user = $this->repository->getDataWithEmail($email);
        if($user){
            $token = app('auth.password.broker')->createToken($user);
            if ($this->sendResetEmail($email, $token)) {
                return ['status'=>200,'msg'=>'Mail has been sent!'];
            }
        }else{
            return ['msg'=>"Email doesn't seem to exist",'status'=>502];
        }
        
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
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
                $user->save();
                event(new PasswordReset($user));
            }
        );
     
        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('user.login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    }
    public function authenticate($request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            return 200;
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
        // $otp = rand(100000, 999999);
        $otp = 789456;
        Session::put('adminAuthOtp', $otp);
        // Notification::route('mail', $email)->notify(new AdminLogInOTP($otp,$email));
        return 200;
    }
    private function sendResetEmail($email, $token)
    {
        $link = config('app.url') . 'auth/reset-password/' . $token . '?email=' . urlencode($email);
        Notification::route('mail', $email)->notify(new UserPasswordResetMail($link,$email));
        return 200;
    }
}
