<?php

namespace App\Http\Admin\AlumniCouncil;

use App\Models\User;
use App\Models\AlumniCouncil;

class AlumniCouncilRepository{
    // public function getData(){
    //     return User::where('role','member')->with('alumniDetails')->get();
    // }
    public function getData($searchTerm = null){
        $query = User::query()->where('role','member')->with('alumniDetails');
        // if ($searchTerm) {
        //     $query->where('product_type', 'LIKE', '%' . $searchTerm . '%');
        // }
        return $query->get();
    }
    public function storeCouncilMembers($request){
        $data = new AlumniCouncil();
        $data['alumni_id'] = $request->alumni_member_id;
        $data['designation'] = $request->designation;
        $data = $data->save();
        return $data;
    }
    public function getCouncilMembers(){
        return AlumniCouncil::with('users.alumniDetails')->get();
    }
}
    