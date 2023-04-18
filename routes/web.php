<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\SiteController;
use \App\Http\Controllers\LoginController;
use \App\Http\Controllers\DashboardController;
use \App\Http\Controllers\ProdutoController;
use \App\Http\Controllers\CategoriaController;


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


// Site
Route::view('/', 'start')->name('products.presentation');
Route::get('/home/{values?}', [SiteController::class, 'index'])        ->name('product.index');

// Login
Route::view('/login', 'login');
Route::post('/auth',    [LoginController::class, 'auth'])    ->name('login.auth');
Route::get('/register', [LoginController::class, 'create'])  ->name('login.create');
Route::get('/logout',   [LoginController::class, 'logout'])  ->name('login.logout');

// User
Route::post('/login', [UserController::class, 'store'])      ->name('users.store');

// Dashboard
Route::get('admin/dashboard',   [DashboardController::class, 'index'])    ->name('admin.index')   ->middleware(['auth',  'checkadmin']);

// Produto
Route::get('admin/produtos',         [ProdutoController::class, 'create'])    ->name('admin.create')   ->middleware(['auth', 'checkadmin']);
Route::get('admin/listagem',         [ProdutoController::class, 'index'])     ->name('admin.listing');
Route::get('produtos/detalhes/{id}', [ProdutoController::class, 'show'])      ->name('products.details');
Route::delete('admin/delete/{id}',   [ProdutoController::class, 'destroy'])   ->name('admin.delete');
Route::post('admin/products',        [ProdutoController::class, 'store'])     ->name('admin.products');

Route::post('admin/categories', [CategoriaController::class, 'store'])         ->name('admin.category');
Route::get('admin/{id}',        [CategoriaController::class, 'destroy'])       ->name('admin.deleteCategory');

// Carrinho
Route::get('add-to-car/{id}',       [ProdutoController::class, 'addToCar']) ->name('add_to_cart')->middleware(['checkcart']);
Route::get('cart',                  [ProdutoController::class, 'cart'])     ->name('cart');
Route::delete('remove_from_cart',   [ProdutoController::class, 'remove'])   ->name('remove_from_cart');
Route::patch('update_cart',         [ProdutoController::class, 'update'])   ->name('update_cart');




