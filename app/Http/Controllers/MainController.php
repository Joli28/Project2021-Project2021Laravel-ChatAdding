<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    public function login()
    {
        return view('authe.login');
    }
    public function register()
    {
        return view('authe.register');
    }
    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:12',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $save = $user->save();

        if ($save) {
            return back()->with(
                'success',
                'New User has been successfuly added to database'
            );
        } else {
            return back()->with(
                'fail',
                'Something went wrong, try again later'
            );
        }
    }
    // function check(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required|min:5|max:12',
    //     ]);
    //     $userInfo = User::where('email', '=', $request->email)->first();
    //     if (!$userInfo) {
    //         return back()->with(
    //             'fail',
    //             'We do not recognize your email address'
    //         );
    //     } else {
    //         if (Hash::check($request->password, $userInfo->password)) {
    //             $request->session()->put('LoggedUser', $userInfo->id);
    //             return redirect('authe/dashboard');
    //         } else {
    //             return back()->with('fail', 'Incorrect Password');
    //         }
    //     }
    // }
    function dashboard()
    {
        $data = [
            'LoggedUserInfo' => User::where(
                'id',
                '=',
                session('LoggedUser')
            )->first(),
        ];
        return view('authe.dashboard', $data);
    }
    function logout()
    {
        if (session()->has('LoggedUser')) {
            session()->pull('LoggedUser');
            return redirect('/authe/login');
        }
    }
}
