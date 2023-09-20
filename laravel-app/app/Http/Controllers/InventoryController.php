<?php

namespace App\Http\Controllers;

use App\Models\catagory;
use App\Models\Color;
use App\Models\Inventory;
use App\Models\Porno;
use App\Models\Size;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
  function varition(){
    $color=Color::all();
    $catagories=catagory::all();
    $size=Size::all();
    return view('varition.varition',[
        'color'=>$color,
        'catagories'=>$catagories,
        'size'=>$size
    ]);
  }
  function varition_store(Request $request){
    $request->validate([
        'color_name'=>'required',



    ]);
    Color::create([
        'color_name'=>$request->color_name,
        'color_code'=>$request->color_code,
        'created_at'=>Carbon::now(),

    ]);
  }

  function size_store(Request $request){
    Size::create([
        'size_name'=>$request->size_name,

        'catagory_id'=>$request->catagory_id,
        'created_at'=>Carbon::now(),

    ]);

  }

  function color_remove($id){
    Color::find($id)->delete();

  }
  function size_remove($id){
    Size::find($id)->delete();

  }

  function inventory($id){
    $product=Porno::find($id);
    $color=Color::all();
    $size=Size::all();
    $inventory=Inventory::where('product_id',$id)->get();


    return view('product_list.inventory',[
        'product'=>$product,
        'color'=>$color,
        'size'=>$size,
        'inventory'=>$inventory
    ]);
  }
  function inventory_store(Request $request,$id){
    Inventory::insert([
        'product_id'=>$id,
        'color_id'=>$request->color_id,
        'size_id'=>$request->size_id,
        'quantity'=>$request->quantity,
    ]);

  }
}
