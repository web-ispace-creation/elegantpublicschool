<?php
namespace App\Http\User\Alumni;

use App\Models\User;

class AlumniRepository{
    public function getAllDataWithAlumniDetailsWithPaginate($filter)
    {
        $query = User::where('role', 'member');
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
}