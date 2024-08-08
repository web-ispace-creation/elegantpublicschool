<?php

namespace App\Http\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Admin\Auth\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use DataTables;

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
        return view('admin.auth.login');
    }
    public function viewRegister()
    {
        return view('admin.auth.register');
    }
    public function register(request $request)
    {
        try {
            $res = $this->service->register($request);
            if($res['status'] != 200){
                return redirect()->back()->withErrors($res['msg'])->withInput();
            }else{
                return redirect()->back()->withSuccess('Added Successfully, Password link will be shared to your email!');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['unknown'=>'Sorry,Something went wrong!'])->withInput();;
        }
    }
    public function index()
    {
        return view('admin.index');
    }
    public function passwordReset($token)
    {
        return view('admin.auth.passwords.reset', ['token' => $token]);
    }
    public function passwordUpdate(Request $request)
    {
        return $this->service->passwordUpdate($request);
    }
    public function verifyByCreator(Request $request)
    {
        try {
            $this->service->sendPasswordResetLink($request->route('admin_id'));
        } catch (\Throwable $th) {
            return response()->json(['msg'=>'Sorry something went wrong']);
        }
    }
    public function authenticate(Request $request)
    {
        try {
            $res =  $this->service->authenticate($request);
            if($res == '200'){
                return redirect()->route('admin.viewOtp');
            }else{
                return back()->withErrors([
                    'email' => 'The provided credentials do not match our records.',
                ])->onlyInput('email');
            }
        } catch (\Throwable $th) {
            dd($th);
            return back()->withErrors([
                'email' => 'Sorry something went wrong',
            ]);
        }
        
    }
    public function viewOtp(){
        return view('admin.auth.verifyOtp');
    }
    public function verifyOtp(Request $request)
    {
        try {
            $res = $this->service->verifyOtp($request);
            if($res['status'] != 200){
                return redirect()->back()->withErrors(['unknown'=>$res['msg']])->withInput();;
            }else{
                return redirect()->route('admin.index');
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
