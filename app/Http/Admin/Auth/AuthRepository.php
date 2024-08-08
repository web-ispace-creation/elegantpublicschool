<?php

namespace App\Http\Admin\Auth;

use App\Models\User;

class AuthRepository
{
    public function storeData($request)
    {
        return User::create($request);
    }
    public function getDataWithId($id)
    {
        return User::find($id);
    }
}
