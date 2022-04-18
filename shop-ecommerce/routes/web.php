<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\User\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\admin\OrderController;


/*==========Admin====================*/
  Route::get('/admin/user/login',[LoginController::class,'index'])->name('login');
  Route::post('admin/user/login/store/',[LoginController::class,'store'])->name('check_login_admin');

/*--------Check  Login admin-----------*/
//Route::middleware(['auth'])->group(function (){
  Route::prefix('/admin')->group(function(){
     
      Route::get('/',[DashboardController::class,'index'])->name('admin.dashboard') ;
      //Products
      Route::prefix('/products')->group(function(){
       Route::get('/add',[MenuController::class,'create']);
       Route::post('/add',[MenuController::class,'store']);//handle
       Route::get('/list',[MenuController::class,'index'])->name('admin.products');
       Route::DELETE('/destroy',[MenuController::class,'destroy']);//handle
       Route::get('/edit/{menu}',[MenuController::class,'show']);
      Route::post('/edit/{menu}',[MenuController::class,'update']);//handle
       });
       //Import
       Route::prefix('/imports')->group(function(){
        Route::get('/add',[MenuController::class,'create']);
        Route::post('/add',[MenuController::class,'store']);//handle
        Route::get('/list',[MenuController::class,'index'])->name('admin.imports');
        Route::DELETE('/destroy',[MenuController::class,'destroy']);//handle
        Route::get('/edit/{menu}',[MenuController::class,'show']);
       Route::post('/edit/{menu}',[MenuController::class,'update']);//handle
        });
       //Orders
       Route::prefix('/orders')->group(function(){
        Route::get('/add',[MenuController::class,'create']);
        Route::post('/add',[MenuController::class,'store']);//handle
        Route::get('/list',[MenuController::class,'index'])->name('admin.orders');//handle
        Route::DELETE('/destroy',[MenuController::class,'destroy']);//handle
        Route::get('/edit/{menu}',[MenuController::class,'show']);
       Route::post('/edit/{menu}',[MenuController::class,'update']);//handle
        });
    
      //Upload
      Route::post('upload/services', [\App\Http\Controllers\Admin\UploadController::class, 'store']);
     

  });
//});
