<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;


class FrontEndController extends Controller
{
    function index(){
        return view('frontend.index');
    }
    function dashboard(){
        return view('dashboard');
    }
    function profile(){
        return view('user.profile');
    }
    function profile_update(Request $request){
       $request->validate([
        'name'=>'required',
        'email'=>'required',

       ]);
        User::find(Auth::id())->update([
            'name'=>$request->name,
            'email'=>$request->email,
        ]);
        return back()->with('success','Profile Updated');


    }
    function passwordshow(Request $request){
        $request->validate([
            'current_password'=>'required',
            'password'=>'required|confirmed',
            'password_confirmation'=>'required'
        ]);
        $user=User::find(Auth::id());
       if(password_verify($request->current_password,$user->password)){
      User::find(Auth::id())->update([
        'password'=>$request->password,


      ]);
      return back()->with('msg','password updated');
       }
       else{
        return back()->with('msg','password not match');


       }

    }
    function uploadImage(Request $request){
       if(Auth::user()->photo==null){
        $img=$request->photo;
        $extension=$img->extension();
        $file_name=Auth::id().'.'.$extension;
        $image=Image::make($img)->resize(300,200)->save(public_path('uploads/user/'.$file_name));

        User::find(Auth::id())->update([
            'photo'=>$file_name,


          ]);
          return back()->with('photos','profile photo updated');
       }
       else{
        $present_photo=public_path('uploads/user/'.Auth::user()->photo);
        unlink($present_photo);

        $img=$request->photo;
        $extension=$img->extension();
        $file_name=Auth::id().'.'.$extension;
        $image=Image::make($img)->resize(300,200)->save(public_path('uploads/user/'.$file_name));


        User::find(Auth::id())->update([
            'photo'=>$file_name,


          ]);
          return back()->with('photos','profile photo updated');

       }


    }
}
