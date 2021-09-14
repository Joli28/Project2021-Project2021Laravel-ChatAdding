<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class MessageController extends Controller
{
    public function conversation($userId){
        $users = User::where('id','!=', Auth::id())->get();
        $employeeinfo = User::findOrFail($userId);
        $myInfo = User::find(Auth::id());

        $this->data['users'] = $users;
        $this->data['employeeinfo']= $employeeinfo;
        $this->data['users']=$users;
        $this->data['userId']=$userId;
        return view('message.conversation', $this->data);
    }
}
