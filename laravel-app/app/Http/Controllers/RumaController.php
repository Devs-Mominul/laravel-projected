<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\catagory;
use App\Models\AshaMoni;
use Carbon\Carbon;


class RumaController extends Controller
{
    function subcatagory(){
        $catagories=catagory::all();
        return view('catagory.subcatagory',[
            'catagories'=>$catagories,
        ]);
    }
    function subcatagory_post(Request $request){
        $request->validate([
            'catagory'=>'required',
            'subcatagory_name'=>'required',
        ]);
        AshaMoni::insert([
            'catagory_id'=>$request->catagory,
            'subcatagory_name'=>$request->subcatagory_name,



        ]);



    }
    function subcatagory_edit($sub_id){
        $catagories=catagory::all();
        $subcatagory=AshaMoni::find($sub_id);
        return view('subcatagory.subcatagory_edit',[
            'catagories'=>$catagories,
            'subcatagory'=>$subcatagory,
        ]);
    }
    function subcatagory_edit_update(Request $request,$sub_ided){
        AshaMoni::find($sub_ided)->update([
            'catagory_id'=>$request->catagory,
            'subcatagory_name'=>$request->subcatagory_name,
            'updated_at'=>Carbon::now(),


        ]);

    }
    function subcatagory_edit_delete($id){
        AshaMoni::find($id)->delete();

    }
}
