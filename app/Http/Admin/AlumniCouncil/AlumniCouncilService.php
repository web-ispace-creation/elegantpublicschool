<?php 
namespace App\Http\Admin\AlumniCouncil;

use App\Http\User\Auth\AuthRepository as userAuthrepository;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class AlumniCouncilService{
    protected $repository,$userAuthrepository;
    public function __construct(AlumniCouncilRepository $repository,userAuthrepository $userAuthrepository)
    {
        $this->repository = $repository;
        $this->userAuthrepository = $userAuthrepository;
    }
    public function getKey($searchTerm)
    {
        $data = $this->repository->getData($searchTerm);
        $result = [];
        foreach ($data as $item) {
            $result[] = ['id' => $item->id,'text' => $item->name.' - '.$item->alumniDetails->application_no ];
        }
        return $result;
    }
    public function addAlumniCouncilMembers($request)
    {
        $validator = Validator::make($request->all(), [
            'alumni_member_id' => 'required', 
            'designation' => 'required', 
        ]);
        if ($validator->fails()) {
            return ['msg'=>$validator->messages(),'status'=>403];
        }else{

            $res =  $this->repository->storeCouncilMembers($request);
            if($res){
                return ['msg'=>'Successfully Stored','status'=>200];
            }else{
                return ['msg'=>'Sorry, something went wrong!','status'=>500];
            }
        }
    }
    public function getDataTable(){
        $data = $this->repository->getCouncilMembers();
        return DataTables::of($data)->addIndexColumn()
            ->addColumn('image', function ($row) {
                $url = asset('/storage/images/profile/' . (!empty($row->users->alumniDetails) ? $row->users->alumniDetails->image : ''));
                return "<img src='" . $url . "' border='0' width='100px' class='img-rounded' align='center' />";
            })
            ->rawColumns(['image','action','role'])
            ->make(true);
    }
}