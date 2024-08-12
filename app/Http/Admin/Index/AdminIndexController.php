<?php

namespace App\Http\Admin\Index;

use App\Http\Admin\Index\AdminIndexService;
use Illuminate\Http\Request;

class AdminIndexController
{
    protected $service;
    public function __construct(AdminIndexService $service){
        $this->service = $service;
    }
    public function index(){
        return view('admin.index');
    }
    public function getDataTable(){
        return $this->service->getDataTable();
    }
    public function getAlumniDataWithId(Request $request){
        try {
            $res = $this->service->getAlumniDataWithId($request->id);
            return response()->json($res);
        } catch (\Throwable $th) {
            return response()->json([
                'status'=>500,
                'msg'=>'Sorry, Something went wrong!'
            ]);
        }
    }
    public function approveMember(Request $request){
        try {
            $res = $this->service->addAppnNmbr($request);
            return response()->json($res);
        } catch (\Throwable $th) {
            return response()->json([
                'status'=>500,
                'msg'=>'Sorry, something went wrong!'
            ]);
        }
    }
}