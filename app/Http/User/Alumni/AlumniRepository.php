<?php
namespace App\Http\User\Alumni;

use App\Models\Experience;
use App\Models\Qualification;
use App\Models\User;

class AlumniRepository{
    public function getAllDataWithAlumniDetailsWithPaginate($filter)
    {
        $query = User::where('role', 'member')->with('alumniCouncil');
        if (!empty($filter['batch'])) {
            $query->whereHas('alumniDetails', function ($query) use ($filter) {
                $query->where('batch', $filter['batch']);
            });
        }
        return $query->with('alumniDetails')->paginate(30);
    }
    public function getProfileWithId($id)
    {
        return User::where('id',$id)->with('alumniDetails', 'qualifications','experience')->first();
    }
    public function removeQualification($id)
    {
        $qualification  = Qualification::find($id);
        return $qualification ->delete();
    }
    public function removeExperience($id)
    {
        $exp = Experience::find($id);
        return $exp ->delete();
    }
    public function getUser($id)
    {
        return User::with('alumniDetails','qualifications','experience')->find($id);
    }
    public function updateUser($request,$user)
    {
         return $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password, 
        ]);
    }
    public function updateUserDetails($alumniDetailsData,$user)
    {
        return $user->alumniDetails()->update($alumniDetailsData);
    }
    public function updateQualification($data,$id)
    {
        return Qualification::find($id)->update($data);
    }
    public function addQualification($data,$user)
    {
        return $user->qualifications()->create($data);
    }
    public function updateExperience($data,$id)
    {
        return Experience::find($id)->update($data);
    }
    public function addExperience($data,$user)
    {
        return $user->experience()->create($data);
    }
}