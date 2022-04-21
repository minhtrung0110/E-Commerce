<?php

use Illuminate\Support\Facades\Route;
/*--========Admin-=======--*/
use App\Http\Controllers\Admin\User\LoginController;
use App\Http\Controllers\Client\LoginCustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\admin\OrderController;

/*================Client===============-*/
use App\Http\Controllers\Client\HomeController;


/*==========Admin====================*/
Route::get('/list',[ProductController::class,'index'])->name('admin.products');

  Route::get('/admin/user/login',[LoginController::class,'index'])->name('admin.login');
  Route::post('admin/user/login/store/',[LoginController::class,'store'])->name('check_login_admin');
/*==========Logout Admin====================*/
Route::get('/admin/logout',[LoginController::class,'logout'])->name('logout.admin');
/*--------Check  Login admin-----------*/
Route::middleware(['checkloginadmin'])->prefix('/admin')->group(function(){
     
      Route::get('/',[DashboardController::class,'index'])->name('admin.dashboard') ;
      //Products
      Route::prefix('/products')->name('admin')->group(function(){
        Route::get('/list',[ProductController::class,'index'])->name('admin.products');
       Route::get('/add',[ProductController::class,'create']);
       Route::post('/add',[ProductController::class,'store']);//handle
       Route::DELETE('/destroy',[ProductController::class,'destroy'])->name('product.delete');//handle
       Route::get('/edit/{id}',[ProductController::class,'show'])->name('product.edit');
      Route::post('/edit/{id}',[ProductController::class,'update']);//handle
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
         Route::get('/list',[OrderController::class,'index'])->name('admin.orders');//handle
        Route::get('/add',[OrderController::class,'create']);
        Route::post('/add',[OrderController::class,'store']);//handle
        Route::DELETE('/destroy',[OrderController::class,'destroy']);//handle
        Route::get('/edit/{menu}',[OrderController::class,'show']);
       Route::post('/edit/{menu}',[OrderController::class,'update']);//handle
        });
    
      //Upload
      Route::post('upload/services', [\App\Http\Controllers\Admin\UploadController::class, 'store']);

      //Staff
      Route::prefix('/staff')->group(function(){
        Route::get('/list',[OrderController::class,'index'])->name('admin.orders');//handle
       Route::get('/add',[OrderController::class,'create']);
       Route::post('/add',[OrderController::class,'store']);//handle
       Route::DELETE('/destroy',[OrderController::class,'destroy']);//handle
       Route::get('/edit/{id}',[OrderController::class,'show']);
      Route::post('/edit/{id}',[OrderController::class,'update']);//handle
       });
      //Customer
     

  });


  /*====================CUSTOMER-LOGIN=========================*/

  Route::get('/login',[LoginCustomerController::class,'index'])->name('login');
  Route::post('/login/store/',[LoginCustomerController::class,'store'])->name('check_login');
  Route::get('/registery',[LoginCustomerController::class,'showRegistery'])->name('registery');
  Route::post('/registery/store/',[LoginCustomerController::class,'storeRegistery'])->name('check_registery');

  /*====================CUSTOMER=========================*/

  Route::prefix('/')->group(function(){

  Route::get('/',[HomeController::class,'index'])->name('home') ;
  Route::get('/products',[HomeController::class,'showListProducts'])->name('home.products') ;
  
  /*----------------------------Profile Customer --------------------*/
  Route::get('/myprofile',[HomeController::class,'showProfileCustomer'])->middleware(['checklogincustomer'])->name('home.profile') ;
  Route::post('/myprofile/store',[HomeController::class,'storeProfileCustomer']) ;
   
   
  });
  /*Route::middleware(['checklogincustomer'])->prefix('/payment')->group(function(){
   
  });*/