<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
 

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'Role',
        'picture',
        'password',
        
    ];
    protected $hidden = [
        'password'
    ];

    public function role(){
        return $this->belongsTo('App\Models\Role');
    }

    public function getPictureAttribute($value){
        if($value){
            return asset('users/images/'.$value);
        }else{
            return asset('users/images/user.png');
        }
    }
}
