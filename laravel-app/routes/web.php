<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\catagoryController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RumaController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/wel', function () {
    return view('welcome');
});

Route::get('/',[FrontEndController::class,'index']);



Route::get(
    '/dashboard',[FrontEndController::class,'dashboard'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/profile/updated',[FrontEndController::class,'profile'])->name('user.profile');
Route::post('/profile/updated/update',[FrontEndController::class,'profile_update'])->name('profile.update');
Route::post('/password',[FrontEndController::class,'passwordshow'])->name('password.update');
Route::post('/upload',[FrontEndController::class,'uploadImage'])->name('upload.image');
Route::get('user/list/',[HomeController::class,'userList'])->name('user.list');
Route::get('user/list/remove/{user_id}',[HomeController::class,'userList_remove'])->name('user.remove');
Route::get('/catagory',[catagoryController::class,'catagory_upload'])->name('catagory.upload');
Route::post('/catagory/update',[catagoryController::class,'catagory_store'])->name('catagory.update');
Route::get('/catagory/page/{catagory_id}',[catagoryController::class,'catagory_update_store'])->name('catagory.find');
Route::post('/catagory/page/update/updated',[catagoryController::class,'catagory_update_store_update'])->name('catagory.finding');

Route::get('/catagory/page/update/updated/delete/{delete_id}',[catagoryController::class,'catagory_update_store_update_delete'])->name('catagory.finding.delete');
Route::get('/soft/delete',[catagoryController::class,'trushed'])->name('trushed');
Route::get('/softdelete/restore/{restore_id}',[catagoryController::class,'restore'])->name('user.restore');
Route::get('/softdelete/harddelete/{hard_id}',[catagoryController::class,'hardDelete'])->name('user.hard');
Route::post('/softdelete/deletecheak',[catagoryController::class,'deletecheak'])->name('delete.cheak');
Route::post('/trushall',[catagoryController::class,'trushall'])->name('trushall');
Route::get('/subcatagory',[RumaController::class,'subcatagory'])->name('subcatagory');
Route::post('/subcatagory/post',[RumaController::class,'subcatagory_post'])->name('subcatagory_post');
Route::get('/subcatagory/edit/{sub_id}',[RumaController::class,'subcatagory_edit'])->name('subcatagory.edited');
Route::post('/subcatagory/update/{sub_ided}',[RumaController::class,'subcatagory_edit_update'])->name('subcatagory.updated');
Route::get('/subcatagory/delete/{sub_ided}',[RumaController::class,'subcatagory_edit_delete'])->name('subcatagory.delete');
Route::get('/brand/preview',[BrandController::class,'BrandPreview'])->name('brandpreview');
Route::post('/brand/preview/pst',[BrandController::class,'BrandPreview_post'])->name('brandpreview_post');
Route::get('/brand/preview/pst/update',[BrandController::class,'BrandPreview_post_update'])->name('brandpreview_post.getten');
Route::post('/brand/preview/pst/update/post/{id}',[BrandController::class,'BrandPreview_post_update_post'])->name('brandpreview_post.post');
Route::get('/brand/preview/pst/update/delete/{id}',[BrandController::class,'BrandPreview_post_update_delete'])->name('brandpreview_post.delete');



// productcontroller execution
Route::get('/product/preview',[ProductController::class,'product'])->name('product');
Route::post('/getsubcatagory',[ProductController::class,'getProduct']);
Route::post('/productstore',[ProductController::class,'product_stored'])->name('product_stored');
Route::get('/product/list',[ProductController::class,'product_list'])->name('list.product');
Route::get('/product/delete/{id}',[ProductController::class,'product_delete'])->name('product.delete');
Route::get('/product/show/{id}',[ProductController::class,'product_show'])->name('product.show');
Route::get('/varition',[InventoryController::class,'varition'])->name('varition');
Route::post('/varition/post',[InventoryController::class,'varition_store'])->name('color.store');

Route::post('/size/post',[InventoryController::class,'size_store'])->name('size.store');

Route::get('/color/delete/{id}',[InventoryController::class,'color_remove'])->name('color.remove');
Route::get('/size/delete/{id}',[InventoryController::class,'size_remove'])->name('size.remove');
Route::get('//delinete/{id}',[InventoryController::class,'inventory'])->name('inventory');
Route::post('//deleinete/{id}',[InventoryController::class,'inventory_store'])->name('inventory.store');




require __DIR__.'/auth.php';
