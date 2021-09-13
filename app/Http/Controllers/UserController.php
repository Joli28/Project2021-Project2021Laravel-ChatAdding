<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    function index(){

        return view('dashboards.users.index', ['users'=> User::paginate(10)]);
    }
    function profile(){
        return view('dashboards.users.profile');
    }
    function updateInfo(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=> 'required|email|unique:users,email,'.Auth::user()->id,
        ]);

        if($validator->fails()){
            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        }else{
             $query = User::find(Auth::user()->id)->update([
                  'name'=>$request->name,
                  'email'=>$request->email,
             ]);

             if(!$query){
                 return response()->json(['status'=>0,'msg'=>'Something went wrong.']);
             }else{
                 return response()->json(['status'=>1,'msg'=>'Your profile info has been update successfuly.']);
             }
        }
    }
    function updatePicture(Request $request){
        $path = 'users/images/';
        $file = $request->file('user_image');
        $new_image_name = 'UIMG'.date('Ymd').uniqid().'.jpg';

        //Upload new image
        $upload = $file->move(public_path($path), $new_image_name);

        if( !$upload ){
            return response()->json(['status'=>0,'msg'=>'Something went wrong, upload new picture failed.']);
        }else{
            //find user
            $user = User::find(Auth::user()->id);
            //Get Old picture
            $findPicture = $user->getAttributes()['picture'];

            if( $findPicture != '' ){
                if( File::exists(public_path($path.$findPicture))){
                    File::delete(public_path($path.$findPicture));
                }
            }

            // Update DB
            $update = $user->update(['picture'=>$new_image_name]);

            if( !$update ){
                return response()->json(['status'=>0,'msg'=>'Something went wrong, updating picture in db failed.']);
            }else{
                return response()->json(['status'=>1,'msg'=>'Your profile picture has been updated successfully']);
            }
        }
    }

}
