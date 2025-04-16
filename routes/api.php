<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\InvoiceController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:api')->group(function () {
    Route::get('/logout', [UserController::class, 'logout']);
    Route::get('/company', [CompanyController::class, 'index']);
    Route::post('/company', [CompanyController::class, 'create']);
    Route::post('/invoice', [InvoiceController::class, 'create']);
    Route::put('/invoice', [InvoiceController::class, 'change']);
});
Route::post('/user', [UserController::class, 'registration']);
Route::post('/login', [UserController::class, 'login']);