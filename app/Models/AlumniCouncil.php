<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlumniCouncil extends Model
{
    use HasFactory;

    protected $fillable = [
        'alumni_id ',
        'designation'
    ];
    public function users(){
        return $this->hasOne(User::class,'id','alumni_id');
    }
}
