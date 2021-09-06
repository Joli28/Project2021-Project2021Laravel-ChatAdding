<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;
    protected $fillable = [
        'Employee_Name',
        'Employee_Surname',
        'Employee_Email',
        'Employee_Password'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
     }
     public function department(){
         return $this->belongsTo('App\Models\Department');
     }
}
