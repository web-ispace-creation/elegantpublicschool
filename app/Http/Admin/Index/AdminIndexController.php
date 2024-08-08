<?php

namespace App\Http\Admin\Index;

use Illuminate\Support\Facades\Gate;

class AdminIndexController
{
    public function index(){
        return view('admin.index');
    }
}