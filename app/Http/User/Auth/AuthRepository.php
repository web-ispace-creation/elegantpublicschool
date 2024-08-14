<?php

namespace App\Http\User\Auth;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class AuthRepository
{
    public function storeData($request,$imageName)
    {
        // Create the User
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password, // Hashing the password
        ]);

        // Create Alumni Details
        $user->alumniDetails()->create([
            'phone' => $request->phone,
            'image' => $imageName, 
            'dob' => $request->dob,
            'batch' => $request->batch,
            'from' => $request->from,
            'to' => $request->to,
        ]);

        // Create Qualifications
        if($request->course !== null){
            foreach ($request->course as $index => $course) {
                $user->qualifications()->create([
                    'course' => $course,
                    'institution_name' => $request->institution[$index],
                    'from' => $request->in_fr[$index],
                    'to' => $request->in_to[$index],
                ]);
            }
        }
        // Create Experiences
        if($request->designation !== null){
            foreach ($request->designation as $index => $designation) {
                $user->experience()->create([
                    'designation' => $designation,
                    'company' => $request->company[$index],
                    'from' => $request->comp_from[$index],
                    'to' => $request->comp_to[$index],
                ]);
            }
        }

        return $user;
    }

    public function getDataWithId($id)
    {
        return User::with('alumniDetails','qualifications','experience')->find($id);
    }
    public function getDataWithEmail($email)
    {
        return User::with('alumniDetails','qualifications','experience')->where('email',$email)->first();
    }
    public function addAppnNmbr($request){
        $user = User::where('id', $request->id)->first();
        if ($user) {
            $user->role='member';
            $user->save();
            $user->alumniDetails()->update(['application_no' => $request->application_no]);
        }
        return $user;
    }
    public function getToken($email)
    {
        return DB::table('password_reset_tokens')->where('email', $email)->first();

    }
}
