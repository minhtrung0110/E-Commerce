<?php

use Illuminate\Support\Facades\Route;
/*--========Admin-=======--*/
use App\Http\Controllers\Admin\User\LoginController;
use App\Http\Controllers\Client\LoginCustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\StaffController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\DiscountController;
/*================Client===============-*/
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\CartController;

/*==========Admin====================*/
// Route::get('/list',[ProductController::class,'index'])->name('admin.products');

  Route::get('/admin/user/login',[LoginController::class,'index'])->name('admin.login');
  Route::post('admin/user/login/store/',[LoginController::class,'store'])->name('check_login_admin');
/*==========Logout Admin====================*/
Route::get('/admin/logout',[LoginController::class,'logout'])->name('logout.admin');
/*--------Check  Login admin-----------*/
Route::middleware(['checkloginadmin'])->prefix('/admin')->group(function(){
     
      Route::get('/',[DashboardController::class,'index'])->name('admin.dashboard') ;
      //Products
      Route::prefix('/products')->group(function(){
        Route::get('/list',[ProductController::class,'index'])->name('admin.products.list');
       Route::get('/add',[ProductController::class,'create'])->name('admin.product.add');
       Route::post('/add',[ProductController::class,'store']);//handle
       Route::DELETE('/destroy',[ProductController::class,'destroy'])->name('product.delete');//handle
       Route::get('/edit/{id}',[ProductController::class,'show'])->name('product.edit');
      Route::post('/edit/{id}',[ProductController::class,'update']);//handle
       });
       //Category
       Route::prefix('/group-products')->group(function(){
         Route::get('/list',[CategoryController::class,'index'])->name('admin.categories.list');
         Route::get('/add',[CategoryController::class,'create'])->name('admin.categories.add');
         Route::post('/add',[CategoryController::class,'store']);
         Route::get('/edit/{id}',[CategoryController::class,'show'])->name('admin.categories.edit');
         Route::post('/edit/{id}',[CategoryController::class,'update']);
         Route::DELETE('/destroy',[CategoryController::class,'destroy']);
       });
       //Discounts
       Route::prefix('/discounts')->group(function(){
         Route::get('/list',[DiscountController::class,'index'])->name('admin.discounts.list');
         Route::get('/add',[DiscountController::class,'create'])->name('admin.discounts.add');
         Route::post('/add',[DiscountController::class,'store']);
         Route::get('/edit/{id}',[DiscountController::class,'show']);
         Route::post('/edit/{id}',[DiscountController::class,'update']);
         Route::DELETE('/destroy',[DiscountController::class,'destroy']);
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
        Route::get('/show/{id}',[OrderController::class,'showDetail']);
        Route::get('/add',[OrderController::class,'create']);
        Route::post('/add',[OrderController::class,'store']);//handle
        Route::DELETE('/destroy',[OrderController::class,'destroy']);//handle
        Route::get('/edit/{id}',[OrderController::class,'show']);
       Route::post('/edit/{id}',[OrderController::class,'update']);//handle
        });
    
      //Upload
      Route::post('upload/services', [\App\Http\Controllers\Admin\UploadController::class, 'store']);

      //Staff
      Route::prefix('/staffs')->group(function(){
        Route::get('/list',[StaffController::class,'index'])->name('admin.staffs');//handle
       Route::get('/add',[StaffController::class,'create']);
       Route::post('/checkEmail',[StaffController::class,'checkEmailExist']);
       Route::post('/add',[StaffController::class,'store']);//handle
       Route::DELETE('/destroy',[StaffController::class,'destroy']);//handle
       Route::get('/edit/{id}',[StaffController::class,'show']);
      Route::post('/edit/{id}',[StaffController::class,'update']);//handle
       });
      //Customer
       //Staff
       Route::prefix('/staffs')->group(function(){
        Route::get('/list',[StaffController::class,'index'])->name('admin.customers');//handle
       Route::get('/add',[StaffController::class,'create']);
       Route::post('/checkEmail',[StaffController::class,'checkEmailExist']);
       Route::post('/add',[StaffController::class,'store']);//handle
       Route::DELETE('/destroy',[StaffController::class,'destroy']);//handle
       Route::get('/edit/{id}',[StaffController::class,'show']);
      Route::post('/edit/{id}',[StaffController::class,'update']);//handle
       });
       //sliders
       Route::prefix('/sliders')->group(function(){
        Route::get('/list',[SliderController::class,'index'])->name('admin.sliders.list');//handle
       Route::get('/add',[SliderController::class,'create'])->name('admin.sliders.add');
       Route::post('/add',[SliderController::class,'store']);//handle
       Route::DELETE('/destroy',[SliderController::class,'destroy']);//handle
       Route::get('/edit/{id}',[SliderController::class,'show']);
      Route::post('/edit/{id}',[SliderController::class,'update']);//handle
       });
     

  });


  /*====================CUSTOMER-LOGIN=========================*/

  Route::get('/login',[LoginCustomerController::class,'index'])->name('login');
  Route::post('/login/store/',[LoginCustomerController::class,'store'])->name('check_login');
  Route::get('/registery',[LoginCustomerController::class,'showRegistery'])->name('registery');
  Route::post('/registery/store/',[LoginCustomerController::class,'storeRegistery'])->name('check_registery');
  Route::get('/logout',[LoginCustomerController::class,'logout'])->name('logout');


  /*====================CUSTOMER=========================*/

  Route::prefix('/')->group(function(){

  Route::get('/',[HomeController::class,'index'])->name('home') ;
  Route::get('/products',[HomeController::class,'showListProducts'])->name('home.products') ;
  Route::get('/detail-product/{id}-{slug}.html', [ProductController::class,'showDetailProduct']);
  /*------------------------------------------------Cart------------------------------------------------*/
  Route::post('/add-cart', [CartController::class,'index']);
  Route::get('/carts', [CartController::class,'show']);
  Route::post('/carts', [CartController::class,'addCart']);
  Route::post('/update-cart', [CartController::class,'update']);
  Route::get('/cart/delete/{id}', [CartController::class,'remove']);

  /*----------------------------Profile Customer --------------------*/
  Route::get('/myprofile',[HomeController::class,'showProfileCustomer'])->middleware(['checklogincustomer'])->name('home.profile') ;
  Route::post('/myprofile/store',[HomeController::class,'storeProfileCustomer']) ;
   
   
  });
  /*Route::middleware(['checklogincustomer'])->prefix('/payment')->group(function(){
   
  });*/