<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function userList(){
        $user_list=User::all();
        return view('user.userlist',[
            'user'=>$user_list,
        ]);
    }
    function userList_remove($user_id){
        User::find($user_id)->delete();
        return back()->with('errors','deleted it');


    }
}
