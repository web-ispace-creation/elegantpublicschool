<?php

namespace App\Http\Admin\Tc;

use App\Http\Admin\Tc\AdminTcRepository;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class AdminTcService
{
    protected $repository;
    public function __construct(AdminTcRepository $repository)
    {
        $this->repository = $repository;
    }
    public function addData($request)
    {
        $validator = Validator::make($request->all(), [
            'name'=>'required',
            'dob'=>'required',
            'admission_no'=>'required',
            'tc'=>'required|mimes:pdf',
        ]);
        if ($validator->fails()) {
            return ['msg'=>$validator->messages()->first(),'status'=>403];
        }else{
            $file = $request->file('tc');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/files/tc', $fileName);
            $structuredData = [
                'name'=>$request->name,
                'dob'=>$request->dob,
                'admission_no'=>$request->admission_no,
                'tc'=>$fileName,
            ];
            $res = $this->repository->store($structuredData);
            if($res){
                return ['msg'=>'Successfully Stored','status'=>200];
            }else{
                return ['msg'=>'Sorry, Something went wrong!','status'=>500];
            }
        }
    }
    public function getDataTable(){
        $data = $this->repository->getData();
        return DataTables::of($data)->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="javascript:void(0)" class="text-success"><i class="bi bi-eye"></i></a>';
                $deleteUrl = route('admin.studentTc.delete');
                $btn = $btn.'<span class="ms-2 text-danger delete-btn" role="button" data-url="'.$deleteUrl.'" data-id="'.$row->id.'"><i class="bi bi-trash"></i></span>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function deleteData($request)
    {
        $student = $this->repository->getDataWithId($request->id);
        $currentFilePath = public_path('storage/files/tc/'.$student->tc);
        if (file_exists($currentFilePath)) {
            unlink($currentFilePath);
        }
        if($student->delete()){
            return ['msg'=>'Deleted!','status'=>200];
        }else{
            return ['msg'=>'Sorry, Something went wrong!','status'=>500];
        }
    }
}