<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\isadmin;
use App\Http\Middleware\isadministrator;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
route::get('myprofilep',[UserController::class,"myprofilep"])->name('myprofilep');
route::post('updateprofile',[UserController::class,'updateprofile'])->name('updateprofile');
route::get('myprofile',[UserController::class,"myprofile"])->name('myprofile');
route::get('myorders',[UserController::class,"myorders"])->name('myorders')->middleware(isadmin::class);
route::post('signupp',[UserController::class,"signupp"])->name('signupp');
route::get('signup',[UserController::class,"signup"])->name('signup');
route::get('curr',[UserController::class,'curr']);
route::get('minus/{id}',[UserController::class,'minus'])->name('minus');
route::post('changecurr',[UserController::class,'changecurr'])->name('changecurr')->middleware(isadministrator::class);
route::post('deladmin',[UserController::class,'deladmin'])->name('deladmin')->middleware(isadministrator::class);
route::get('hot',[UserController::class,"hotnow"]);
route::get('models',[UserController::class,"returnmodels"]);
route::get('take',[UserController::class,'takefromuploads']);
route::get('indexdata',[UserController::class,'indexdata']);
route::get('/',[UserController::class,'showindex'])->name('home');
route::get('add/{id}',[UserController::class,"shto"])->name('shto');
route::get('searchproduct',[UserController::class,'searchp'])->name('searchp');
route::post('deletecategory',[UserController::class,'deletep'])->name('deletep')->middleware(isadministrator::class);
route::post('insertcategory',[UserController::class,'insertp'])->name('insertp')->middleware(isadministrator::class);
route::get('insert',[UserController::class,'insert'])->name('insert')->middleware(isadministrator::class);
route::get('search',[UserController::class,'search'])->name('search');
route::post('lisdonetorders',[UserController::class,"listdoneorders"])->name('listdoneorders')->middleware(isadministrator::class);
route::post('listorders',[UserController::class,"listorders"])->name('listorders')->middleware(isadministrator::class);
route::get('admin-login',[UserController::class,'loging'])->name('loging');
//Route::get('/',[UserController::class,"home"])->name('home');
route::get('addadmin',[UserController::class,'addadmin'])->name('addadmin')->middleware(isadministrator::class);
route::get('delete/{id}',[UserController::class,'fshije'])->name('fshije')->middleware(isadmin::class);
Route::get('allposts',[UserController::class,'allposts'])->name('allposts')->middleware(isadmin::class);
Route::get('delorder/{id}',[UserController::class,'delorder'])->name('delorder')->middleware(isadministrator::class);
Route::get('undone/{id}',[UserController::class,'undone'])->name('undone')->middleware(isadministrator::class);
Route::get('doneorders',[UserController::class,'doneorders'])->name('doneorders')->middleware(isadministrator::class);
Route::get('done/{id}',[UserController::class,'perfunduar'])->name('done')->middleware(isadministrator::class);
Route::get('orders',[UserController::class,'orders'])->name('orders')->middleware(isadministrator::class);
Route::get('upload',[UserController::class,"uploadg"])->name('uploadg')->middleware(isadmin::class);
route::get('order',[UserController::class,"porosit"])->name('porosit');
route::get('checkout',[UserController::class,"checkout"])->name('checkout');
route::get('del',[UserController::class,"del"])->name('del');
route::get('send',[UserController::class,"send"])->name('send');
Route::post('addadminp',[UserController::class,'addadminp'])->name('addadminp')->middleware(isadministrator::class);
route::get('showcart',[UserController::class,"showcart"])->name('showcart');
route::get('deleteprod/{id}',[UserController::class,"deleteprod"])->name('deleteprod');
route::get('deleteall',[UserController::class,"deleteall"]);
route::get('cart',[UserController::class,"shporta"])->name('shporta');
route::post('uploaded',[UserController::class,"uploadp"])->name('uploadp')->middleware(isadmin::class);
route::get('logout',[UserController::class,"logout"])->name('logout');
route::get('returnhash',[UserController::class,'returnhash']);
route::get('{upload}',[UserController::class,'shiko'])->name('shiko');
route::post('login',[UserController::class,'login'])->name('login');
route::post('edit/{id}',[UserController::class,"ndrysho"])->name('ndrysho');




