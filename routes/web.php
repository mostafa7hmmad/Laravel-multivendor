<?php

use App\Http\Controllers\Admin\Admincontroller as AdminAdmincontroller;
use App\Http\Controllers\Dashboard\Admincontroller;
use App\Http\Controllers\Dashboard\Admins\Adminscontroller;
use App\Http\Controllers\Dashboard\Cat\Catcontroller;
use App\Http\Controllers\Dashboard\Client\Clientcontroller as ClientClientcontroller;
use App\Http\Controllers\Dashboard\Customer\Customercontroller;
use App\Http\Controllers\Dashboard\Dashboardcontroller;
use App\Http\Controllers\Dashboard\Subcat\subcontroller;
use App\Http\Controllers\Front\Clientcontroller;
use App\Http\Controllers\Front\indexController;
use App\Http\Controllers\Front\shopcontroller;
use App\Http\Controllers\Front\SubcatController;
use Illuminate\Support\Facades\Route;

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

// Home route
Route::get('/', [IndexController::class, 'index'])->name('index-us');

// Routes for shop and subcategories
Route::get('/shop/{id}', [ShopController::class, 'shop'])->name('shop-us');
Route::get('/subcategory/{id}', [ShopController::class, 'subcategory'])->name('subcat-us');

// Route to handle client creation
Route::post('/client-create', [ClientController::class, 'create'])->name('client-create-us');

// Route to check cart summary
Route::match(['GET', 'POST'], '/final', [ShopController::class, 'check'])->name('check-us');
Route::get('/login', [AdminController::class, 'login'])->name('login-us');
Route::post('/login/User', [AdminController::class, 'dologin'])->name('dologin-us');



Route::middleware('adminAuth:admin')->group(function(){

    Route::get('logout/',[Admincontroller::class,'logout'])->name('logout-us');
Route::get('/dashboard', [Dashboardcontroller::class,'dashboard'])->name('dashboard-us');
Route::get('/dashboard/cats', [Catcontroller::class,'cat'])->name('cat-us');
Route::get('/dashboard/Admins', [Adminscontroller::class,'admins'])->name('admin-us');
Route::get('/catcreat', [Catcontroller::class,'catcreat'])->name('cat-creat-us');
Route::post('/cat/store/', [Catcontroller::class,'catstore'])->name('cat-store-us');
Route::get('/cats/delete/{id}',[Catcontroller::class,'delete'])->name('delete-us');

Route::get('cat/edit/{id}',[Catcontroller::class,'edit'])->name('cat-edit-us');
Route::post('cat/update/{id}',[Catcontroller::class,'update'])->name('cat-update');





// subcat
Route::get('/dashboard/subcats/', [subcontroller::class,'subcat'])->name('subcat-Dashboard-us');
Route::get('/sub/catcreat', [subcontroller::class,'subcatcreat'])->name('subcat-creat-us');
Route::post('/subcat/store/', [subcontroller::class,'subcatstore'])->name('subcat-store-us');
Route::get('/subcats/delete/{id}',[subcontroller::class,'subdelete'])->name('sub-delete-us');

Route::get('/sub/edit/{id}',[subcontroller::class,'subedit'])->name('subcat.edit-us');
Route::post('sub/update/{id}',[subcontroller::class,'subupdate'])->name('subcats.update-us');
//end subcat
// start admin
Route::get('admin/create/data',[Adminscontroller::class,'create'])->name('admin-create-us');
Route::post('admin/store/', [Adminscontroller::class,'store'])->name('admin-store-us');
Route::get('admins/delete/{id}',[Adminscontroller::class,'delete'])->name('delete-admin-us');
//admin end
//client
Route::get('clients/delete/{id}',[ClientClientcontroller::class,'delete'])->name('delete-client-us');
Route::get('clients/',[ClientClientcontroller::class,'clients'])->name('client-dah-us');
//end client
//customer
Route::get('customers/',[ClientClientcontroller::class,'customers'])->name('customer-dah-us');
Route::get('customer/delete/{id}',[ClientClientcontroller::class,'deletecustomer'])->name('delete-customers-us');


//end customer

});
//start Customer
Route::get('Customers/create/data',[Customercontroller::class,'customer'])->name('customer-us');
Route::post('Customers/store/', [Customercontroller::class,'store'])->name('Customers-store-us');

Route::middleware('customerAuth:customer')->group(function () {

    Route::get('Dashboard/Customers/',[Customercontroller::class,'Dasboard'])->name('Dasboard-customer-us');
    Route::get('Customers/Cats',[Customercontroller::class,'cats'])->name('Dasboard-customer-cats-us');
    Route::get('Customers/subCats',[Customercontroller::class,'subcats'])->name('customer-subcats-us');
    Route::get('Customers',[Customercontroller::class,'customers'])->name('customer_dash-us');


});
