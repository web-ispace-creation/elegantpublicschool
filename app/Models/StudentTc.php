<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentTc extends Model
{
    protected $fillable = [
        'name',
        'dob',
        'admission_no',
        'tc',
    ];
}
