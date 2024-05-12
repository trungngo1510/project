<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\MemberController;
use App\Http\Controllers\Api\ProductController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/user',[MemberController::class,'user']);
Route::get('/blog',[BlogController::class, 'list']);

//member
Route::post('/login',[MemberController::class,'login']);
Route::post('/register',[MemberController::class,'register']);


//product
Route::get('product',[ProductController::class,'index']);
Route::get('/product/detail/{id}',[ProductController::class,'detail']);
Route::post('/product/cart',[ProductController::class,'productCart']);

Route::middleware(['auth:sanctum'])->group(function(){
    Route::post('/user/update/{id}',[MemberController::class, 'update']);
});