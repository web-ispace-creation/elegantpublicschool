<?php
namespace App\Http\User\Alumni;

use App\Http\User\Alumni\AlumniRepository;
use App\Http\User\Auth\AuthRepository;

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
} 

?>