<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\User\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProductController;
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
//Route::get('/',[LoginController::class,'show']);

Route::get('/main',[DashboardController::class,'index'])->name('admin.dashboard');
Route::get('/product',[ProductController::class,'index'])->name('admin.products');
/*==========Admin====================*/
Route::prefix('admin')->group(function(){
  Route::get('/user/login',[LoginController::class,'index'])->name('login');
  Route::post('/user/login/store/',[LoginController::class,'store'])->name('check_login_admin');
});
/*--------Check  Login admin-----------*/
Route::middleware('auth')->group(function (){
  Route::prefix('admin')->group(function(){
      // Route::get('/',[MainController::class,'index'])->name('admin');
      // Route::get('/main',[MainController::class,'index']);
      Route::get('/main',[DashboardController::class,'index'])->name('admin') ;
      //Menu
      Route::prefix('/menus')->group(function(){
       Route::get('/add',[MenuController::class,'create'])->name('admin.menus.add');
       Route::post('/add',[MenuController::class,'store']);//handle
       Route::get('/list',[MenuController::class,'index']);//handle
       Route::DELETE('/destroy',[MenuController::class,'destroy']);//handle
       Route::get('/edit/{menu}',[MenuController::class,'show']);
      Route::post('/edit/{menu}',[MenuController::class,'update']);//handle
       });
       //Product
      Route::prefix('/products')->group(function(){
          Route::get('/add',[ProductController::class,'create'])->name('admin.products.add');
          Route::post('/add',[ProductController::class,'store']);//handle

          Route::get('/list',[ProductController::class,'index'])->name('admin.products.list');
          Route::DELETE('/destroy',[ProductController::class,'destroy']);//handle
          Route::get('edit/{product}',[ProductController::class,'show']);
         Route::post('edit/{product}',[ProductController::class,'update']);//handle
      });
      //Upload
      Route::post('upload/services', [\App\Http\Controllers\Admin\UploadController::class, 'store']);
      //Slider
      Route::prefix('/sliders')->group(function(){
          Route::get('/add',[SliderController::class,'create'])->name('admin.sliders.add');
          Route::post('/add',[SliderController::class,'store']);//handle

          Route::get('/list',[SliderController::class,'index'])->name('admin.sliders.list');
          Route::DELETE('/destroy',[SliderController::class,'destroy']);//handle
          Route::get('edit/{slider}',[SliderController::class,'show']);
         Route::post('edit/{slider}',[SliderController::class,'update']);//handle
      });
 

  });
});
