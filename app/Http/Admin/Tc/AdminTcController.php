<?php

namespace App\Http\Admin\Tc;

use App\Http\Controllers\Controller;
use App\Http\Admin\Tc\AdminTcService;
use Illuminate\Http\Request;

class AdminTcController extends Controller
{
    protected $service;
    public function __construct(AdminTcService $service)
    {
        $this->service = $service;
    }
    public function index()
    {
        return view('admin.tc');
    }
    public function addData(Request $request)
   {
        try {
            $res = $this->service->addData($request);
            return response()->json($res);
        } catch (\Throwable $th) {
            return response()->json(['status'=>500,'msg'=>'Sorry, Something went wrong!']);
        }
   }
   public function getDataTable()
   {
        return $this->service->getDataTable();
   }
   public function deleteData(Request $request)
   {
        try {
            $res = $this->service->deleteData($request);
            return response()->json($res);
        } catch (\Throwable $th) {
            return response()->json(['status'=>500,'msg'=>'Sorry, Something went wrong!']);
        }
   }
}