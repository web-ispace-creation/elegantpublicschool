<?php
namespace App\Http\Admin\Tc;

use App\Models\StudentTc;

class AdminTcRepository
{
    public function store($structuredData)
    {
        return StudentTc::create($structuredData);
    }
    public function getData(){
        return StudentTc::get();
    }
    public function getDataWithId($id){
        return StudentTc::find($id);
    }
}