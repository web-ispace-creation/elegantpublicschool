<?php
namespace App\Http\User\Alumni;

use App\Http\User\Alumni\AlumniRepository;
use App\Http\User\Auth\AuthRepository;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AlumniService
{
    protected $repository;
    public function __construct(AlumniRepository $repository)
    {
        $this->repository = $repository;
    }
    public function getAllDataWithAlumniDetailsWithPaginate($filter)
    {
        return $this->repository->getAllDataWithAlumniDetailsWithPaginate($filter);
    }
    public function getProfileWithId($id)
    {
        return $this->repository->getProfileWithId($id);
    }
    public function removeQualification($id)
    {
        $res = $this->repository->removeQualification($id);
        if($res){
            return ['status'=>200,'msg'=>'Qualification deleted!'];
        }else{
            return ['status'=>502,'msg'=>'Sorry, something went wrong!'];
        }
    }
    public function removeExperience($id)
    {
        $res = $this->repository->removeExperience($id);
        if($res){
            return ['status'=>200,'msg'=>'Qualification deleted!'];
        }else{
            return ['status'=>502,'msg'=>'Sorry, something went wrong!'];
        }
    }
    public function updateProfile($request)
    {
        $validator = Validator::make($request->all(), [
            'name'=>'required',
            'email' => 'required|email|unique:users,email,'.$request->id,
            'phone' => 'required|numeric|unique:alumni_details,phone,'.$request->alumniDetails_id,
            'image' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'course.*' =>   'required',
            'institution.*' =>   'required',
            'in_fr.*' =>   'required',
            'in_to.*' =>   'required',
            'designation.*' =>   'required',
            'company.*' =>   'required',
            'comp_from.*' =>   'required',
            'comp_to.*' =>   'required',
            'dob' => 'required|date',
            'batch' => 'required|numeric|min:2000|max:2024',
            'from' => 'required|date',
            'to' => 'required|date|after_or_equal:from',
        ]);
            if ($validator->fails()) {
                return ['msg'=>$validator->messages()->first(),'status'=>403];
            }else{
                $image = $request->file('image');
                if($image !== null){
                    $imageName = time() . '.' . $image->getClientOriginalExtension();
                    $image->storeAs('public/images/profile', $imageName);
                }else{
                    $imageName=null;
                }
                $user = $this->repository->getUser($request->id);
                // update user
                $updateUser = $this->repository->updateUser($request,$user);
                if($updateUser){
                    // alumni detail update data processing
                    $alumniDetailsData = [
                        'phone' => $request->phone,
                        'dob' => $request->dob,
                        'batch' => $request->batch,
                        'from' => $request->from,
                        'to' => $request->to,
                    ];

                    if ($imageName !== null) {
                        $alumniDetailsData['image'] = $imageName;
                        $currentImagePath = public_path('storage/images/profile/'.$user->alumniDetails->image);
                        if (file_exists($currentImagePath)) {
                            unlink($currentImagePath);
                        }
                    }
                    $updateUserDetails = $this->repository->updateUserDetails($alumniDetailsData,$user);
                    if($updateUserDetails){
                        if($request->course !== null){
                            // alumni qualification update data processing and updating
                            foreach ($request->course as $index => $course) {
                                $alumniQualification = [
                                    'course' => $request->course[$index],
                                    'institution_name' => $request->institution[$index],
                                    'from' => $request->in_fr[$index],
                                    'to' => $request->in_to[$index],
                                ];
                                // Log::info($request->qualification_id[$index]);
                                if (isset($request->qualification_id[$index])) {
                                     $this->repository->updateQualification($alumniQualification,$request->qualification_id[$index]);
                                }else{
                                     $this->repository->addQualification($alumniQualification,$user);
                                }
                            }
                        }
                        if($request->designation !== null){
                            // alumni experience update data processing and updating
                            foreach ($request->designation as $index => $designation) {
                                $alumniExperience = [
                                    'designation' => $designation,
                                    'company' => $request->company[$index],
                                    'from' => $request->comp_from[$index],
                                    'to' => $request->comp_to[$index],
                                ];
                                if (isset($request->experience_id[$index])) {
                                     $this->repository->updateExperience($alumniExperience,$request->experience_id[$index]);
                                }else{
                                     $this->repository->addExperience($alumniExperience,$user);
                                }
                            }
                        }
                    }
                }
                return ['msg'=>'Successfully Stored','status'=>200];
        }
    }
} 

?>