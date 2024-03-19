<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\SubcategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CategoryController;
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

Route::get('/',[FrontendController::class, 'index']);
Route::get('/product/details/{id}/{slug}',[FrontendController::class, 'productDetail']);
Route::get('/category/products/{slug}',[FrontendController::class, 'categoryProduct']);
Route::post('/add/to/cart',[CartController::class, 'addToCart']);
Route::get('/checkout', [FrontendController::class, 'checkout']);
Route::post('/cart/product/qty/update/{id}', [FrontendController::class, 'qtyUpdate']);
Route::get('/cart/product/delete/{id}', [CartController::class, 'cartDelete']);
Route::post('/confirm/order', [CartController::class, 'confirmOrder']);
Route::get('/invoice/print/{id}', [AdminController::class, 'invoicePrint']);






Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');

    // catergoty
    Route::get('/category/add', [CategoryController::class, 'categoryAddForm'])->name('category.add');
    Route::get('/category/manage', [CategoryController::class, 'categoryManage'])->name('category.manage');
    Route::post('/category/store', [CategoryController::class, 'categoryStore'])->name('category.store');
    Route::get('/category/edit/{id}', [CategoryController::class, 'categoryEdit'])->name('category.edit');
    Route::post('/category/update/{id}',[CategoryController::class, 'categoryUpdate'])->name('category.update');
    Route::get('/category/delete/{id}', [CategoryController::class, 'categoryDelete'])->name('category.delete');
    // End-catergoty                                                                                      

    // Sub-Category
    Route::get('/subcategory/add', [SubcategoryController::class, 'subcategoryAddForm'])->name('sub-category.add');
    Route::post('/subcategory/store',[SubcategoryController::class, 'sucategoryStore'])->name('subcategory.store');
    Route::get('/subcategory/manage', [SubcategoryController::class, 'subcategoryManage'])->name('sub-category.manage');
    Route::get('/subcategory/edit/{id}', [SubcategoryController::class, 'subcategoryEdit'])->name('subcategory.edit');
    Route::post('/subcategory/update/{id}', [SubcategoryController::class, 'subcategoryUpdate'])->name('subcategory.update');
    Route::get('/subcategory/delete/{id}', [SubcategoryController::class, 'subcategoryDelete'])->name('subcategory.delete');
    // End-Sub-Category

    // Product
    Route::get('/product/add', [ProductController::class, 'productAdd'])->name('product.add');
    Route::get('/product/manage', [ProductController::class, 'productManage'])->name('product.manage');
    Route::post('/product/store', [ProductController::class, 'productStore'])->name('product.store');
    Route::get('/admin/product/edit/{id}', [ProductController::class, 'productEdite'])->name('product.edit');
    Route::post('/admin/product/update/{id}', [ProductController::class, 'productUpdate'])->name('product.update');
    Route::get('/admin/product/delete/{id}', [ProductController::class, 'productDelete'])->name('product.delete');
    // End-Product
});