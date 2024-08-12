<?php
namespace App\Http\Admin\Index;

use App\Models\User;

class AdminIndexRepository{
    public function getData(){
        return User::with('alumniDetails')->get();
    }
}