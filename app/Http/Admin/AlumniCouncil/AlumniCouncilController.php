<?php

namespace App\Http\Admin\AlumniCouncil;

use App\Http\Admin\AlumniCouncil\AlumniCouncilService;
use Illuminate\Http\Request;

class AlumniCouncilController
{
    protected $service;
    public function __construct(AlumniCouncilService $service){
        $this->service = $service;
    }
    public function index(){
        return view('admin.alumniCouncil');
    }
    public function getDataTable(){
        return $this->service->getDataTable();
    }
}