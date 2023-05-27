<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    // Route Home/Dashboard
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
    // Route Category
    Route::resource('/category', CategoryController::class);
    // Route Product
    Route::resource('/product', ProductController::class);
    // Route Member
    Route::resource('/member', MemberController::class);
    Route::get('api/member', [MemberController::class, 'api']);
    // Route Supplier
    Route::resource('/supplier', SupplierController::class);
    Route::get('api/supplier', [SupplierController::class, 'api']);
    // Route Purchase Order
    Route::resource('/purchase', PurchaseOrderController::class);
    // Route::get('api/purchase', [PurchaseOrderController::class, 'api']);
    Route::get('purchase/product/{supplier_id}', [PurchaseOrderController::class, 'get_product']);
    Route::get('purchase/approved/{id_purchase}', [PurchaseOrderController::class, 'approved']);
    Route::get('purchase/line/{id_po_line}', [PurchaseOrderController::class, 'delete_line']);
    Route::get('purchase/{id_purchase}', [PurchaseOrderController::class, 'update']);
    Route::post('/pdf/{id_purchase}', [PurchaseOrderController::class, 'viewPdf'])->name('pdf');
    // Route Sale
    Route::resource('/sale', SaleController::class);
    Route::get('product/ajax/{code_product}', [SaleController::class, 'get_product']);
    Route::get('/history', [SaleController::class, 'history']);
    Route::get('/filter', [SaleController::class, 'filter']);
    // Route Company
    Route::resource('/company', CompanyController::class);
});
