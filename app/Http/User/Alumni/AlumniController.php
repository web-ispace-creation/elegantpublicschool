<?php
namespace App\Http\User\Alumni;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AlumniController extends Controller
{
    protected $service;
    public function __construct(AlumniService $service)
    {
        $this->service = $service;
    }
    public function index(Request $request)
    {
        $request->batch !== null ? $filter['batch'] = $request->batch : $filter['batch']=null;
        $data = $this->service->getAllDataWithAlumniDetailsWithPaginate($filter);
        return view('users.index',['data'=>$data]);
    }
    public function profile($id){
        $data = $this->service->getProfileWithId($id);
        return view('users.userProfile',['data'=>$data]);
    }
    public function editProfile($id){
        $data = $this->service->getProfileWithId($id);
        return view('users.edit-profile',['data'=>$data]);
    }
    public function removeQualification(Request $request)
    {
        try {
            $res = $this->service->removeQualification($request->id);
            return response()->json($res);
        } catch (\Throwable $th) {
            return response()->json(['status'=>500,'msg'=>'Sorry, something went wrong!']);
        }
    }
    public function removeExperience(Request $request)
    {
        try {
            $res = $this->service->removeExperience($request->id);
            return response()->json($res);
        } catch (\Throwable $th) {
            return response()->json(['status'=>500,'msg'=>'Sorry, something went wrong!']);
        }
    }
    public function updateProfile(Request $request)
    {
        try {
            $res = $this->service->updateProfile($request);
            return response()->json($res);
        } catch (\Throwable $th) {
            dd($th);
            return response()->json(['status'=>500,'msg'=>'Sorry, something went wrong!']);
        }
    }
} 

?>