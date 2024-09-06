<?php

namespace App\Http\User\Auth;

use App\Http\Controllers\Controller;
use App\Http\User\Auth\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use DataTables;
use Illuminate\Support\Facades\Log;

// use App\DataTables\UsersDataTable;
class AuthController extends Controller
{
    protected $service;
    public function __construct(AuthService $service)
    {
        $this->service = $service;
    }
    public function login()
    {
        return view('users.auth.login');
    }
    public function viewRegister()
    {
        return view('users.auth.register');
    }
    public function register(request $request)
    {
        try {
            $res = $this->service->register($request);
            return response()->json($res);
        } catch (\Throwable $th) {
            return response()->json(['status'=>500,'msg'=>'Sorry, Something went wrong!']);
        }
    }
    public function index()
    {
        return view('users.index');
    }
    public function passwordReset($token)
    {
        return view('users.auth.passwords.reset', ['token' => $token]);
    }
    public function passwordUpdate(Request $request)
    {
        return $this->service->passwordUpdate($request);
    }
    public function forgotPassword(Request $request)
    {
        try {
            $res = $this->service->sendPasswordResetLink($request->email);
            return response()->json($res);
        } catch (\Throwable $th) {
            return response()->json(['msg'=>'Sorry something went wrong','status'=>500]);
        }
    }
    public function authenticate(Request $request)
    {
        try {
            $res =  $this->service->authenticate($request);
            if($res == '200'){
                return redirect()->route('users.index');
            }else{
                return back()->withErrors([
                    'email' => 'The provided credentials do not match our records.',
                ])->onlyInput('email');
            }
        } catch (\Throwable $th) {
            return back()->withErrors($th->validator);
        }
        
    }
    public function viewOtp(){
        return view('users.auth.verifyOtp');
    }
    public function verifyOtp(Request $request)
    {
        try {
            $res = $this->service->verifyOtp($request);
            if($res['status'] != 200){
                return redirect()->back()->withErrors(['unknown'=>$res['msg']])->withInput();;
            }else{
                return redirect()->route('users.index');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['unknown'=>'Sorry,Something went wrong!'])->withInput();;
        }
    }
    public function logout(Request $request)
    {
        $res =  $this->service->logout($request);
        if($res === 200){
            return redirect()->back();
        }
    }
}
