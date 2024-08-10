<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlumniDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'application_no ',
        'phone',
        'image',
        'dob',
        'batch',
        'from',
        'to'
    ];
    public function user(){
        return $this->hasOne(User::class);
    }
}
