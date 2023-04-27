<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\CategoryController;

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

Route::view('/', '/landing-page')->middleware('guest');

// Register
Route::get('/register', [AuthController::class, 'register'])->middleware('guest');
Route::post('/userAdd', [AuthController::class, 'registerProcess'])->middleware('guest');

// Login
Route::get('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/userLogin', [AuthController::class, 'loginProcess'])->middleware('guest');

// Logout
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

// Profile
Route::get('/user-profile', [AuthController::class, 'profile'])->middleware('auth');

// Tampilan Shop
Route::get('/shop', [ItemController::class, 'index'])->middleware('auth');

// Category
// Read
Route::get('/category', [CategoryController::class, 'index'])->middleware(['auth', 'isAdmin']);
//Create
Route::get('/category-add', [CategoryController::class, 'create'])->middleware(['auth', 'isAdmin']);
Route::post('/categoryAdd', [CategoryController::class, 'store'])->middleware(['auth', 'isAdmin']);

// Item
// Create
Route::get('/item-add', [ItemController::class, 'create'])->middleware(['auth', 'isAdmin']);
Route::post('/itemAdd', [ItemController::class, 'store'])->middleware(['auth', 'isAdmin']);
// Read
Route::get('/item-list', [ItemController::class, 'view'])->middleware(['auth', 'isAdmin']);
// Update
Route::get('/item-edit/{id}', [ItemController::class, 'edit'])->middleware(['auth', 'isAdmin']);
Route::put('/itemUpdate/{id}', [ItemController::class, 'update'])->middleware(['auth', 'isAdmin']);
// Delete
Route::get('/item-delete/{id}', [ItemController::class, 'delete'])->middleware(['auth', 'isAdmin']);
Route::delete('/itemDelete/{id}', [ItemController::class, 'destroy'])->middleware(['auth', 'isAdmin']);

// Cart
Route::get('/cart/{id}', [UserController::class, 'index'])->middleware('auth');
Route::get('/item-detail/{id}', [UserController::class, 'create'])->middleware('auth');
Route::post('/cartAdd/{id}', [UserController::class, 'store'])->middleware('auth');

// Invoice
Route::get('/invoice/{id}', [InvoiceController::class, 'invoice'])->middleware('auth');
Route::post('/invoicePost/{id}', [InvoiceController::class, 'invoiceCreate'])->middleware('auth');
Route::get('/invoice-list', [InvoiceController::class, 'showInvoice'])->middleware(['auth', 'isAdmin']);
