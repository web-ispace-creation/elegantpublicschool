<?php

namespace App\Http\Admin\AlumniCouncil;

use App\Http\Admin\AlumniCouncil\AlumniCouncilService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class AlumniCouncilController
{
    protected $service;
    public function __construct(AlumniCouncilService $service){
        $this->service = $service;
    }
    public function index(){
        return view('admin.alumniCouncil');
    }
    public function selectMember(Request $request){
        $searchTerm = $request->input('search');
        $data = $this->service->getKey($searchTerm);
        return Response::json(['data' => $data]);
    }
    public function addCouncil(Request $request){
        try {
            $res = $this->service->addAlumniCouncilMembers($request);
            return response()->json($res);
        } catch (\Throwable $th) {
            return response()->json([
                'status'=>500,
                'msg'=>'Sorry, Something went wrong!'
            ]);
        }
    }
    public function getDataTable(){
        return $this->service->getDataTable();
    }
}