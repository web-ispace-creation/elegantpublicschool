<?php 
namespace App\Http\Admin\Index;

use App\Http\User\Auth\AuthRepository as userAuthrepository;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class AdminIndexService{
    protected $repository,$userAuthrepository;
    public function __construct(AdminIndexRepository $repository,userAuthrepository $userAuthrepository)
    {
        $this->repository = $repository;
        $this->userAuthrepository = $userAuthrepository;
    }
    public function getDataTable(){
        $data = $this->repository->getData();
        // dd($data);
        return DataTables::of($data)->addIndexColumn()
            ->addColumn('image', function ($row) {
                $url = asset('/storage/images/profile/' . (!empty($row->alumniDetails) ? $row->alumniDetails->image : ''));
                return "<img src='" . $url . "' border='0' width='100px' class='img-rounded' align='center' />";
            })
            ->addColumn('action', function($row){
                $btn = '<a href="javascript:void(0)" class="text-success"><i class="bi bi-eye"></i></a>';
                $editUrl = route('admin.get.alumni.member.data');
                // $deleteUrl = route('superadmin.deleteHeroSlider');
                $btn = '<span class="ms-2 text-primary edit-btn" role="button" data-url="'.$editUrl.'" data-id="'.$row->id.'"><i class="bi bi-pencil"></i></span>';
                // $btn = $btn.'<span class="ms-2 text-danger delete-btn" role="button" data-url="'.$deleteUrl.'" data-id="'.$row->id.'"><i class="bi bi-trash"></i></span>';
                return $btn;
            })
            ->editColumn('role', function($row){
                 if($row->role == 'user'){
                    return '<span class="text-danger"> Pending </span>';
                 }else{
                    return $row->role;
                 }
               })
            ->rawColumns(['image','action','role'])
            ->make(true);
    }
    public function getAlumniDataWithId($id){
        return $this->userAuthrepository->getDataWithId($id);
    }
    public function addAppnNmbr($request){
        $validator = Validator::make($request->all(), [
            'application_no' => 'required', 
            'id' => 'required', 
        ]);
        if ($validator->fails()) {
            return ['msg'=>$validator->messages(),'status'=>403];
        }else{
            $res =  $this->userAuthrepository->addAppnNmbr($request);
            if($res){
                return ['msg'=>'Successfully updated','status'=>200];
            }else{
                return ['msg'=>'Sorry, something went wrong!','status'=>500];
            }
        }
    }
}