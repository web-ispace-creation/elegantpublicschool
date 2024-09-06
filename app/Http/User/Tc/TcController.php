<?php

namespace App\Http\User\Tc;

use App\Http\Controllers\Controller;
use App\Models\StudentTc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TcController extends Controller
{
    public function authForm()
    {
        return view('users.tc-auth');
    }
    public function downloadTC(Request $request)
    { 
        $validator = Validator::make($request->all(), [
            'name'=>'required',
            'dob'=>'required',
            'admission_no'=>'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }else{
            $res = StudentTc::where(['dob'=>$request->dob,'admission_no'=>$request->admission_no])->first();
            if($res){
                $file = public_path("storage/files/tc/" . $res->tc);
                if (file_exists($file)) {
                    return response()->download($file);
                } else {
                    return back()->with('error', 'File not found.');
                }
            } else {
                return back()->with('error', 'No matching record found.');
            }
        }
    }
}