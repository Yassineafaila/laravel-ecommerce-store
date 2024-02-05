<?php

use App\Http\Controllers\ProductController;
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

//Get All The Products
Route::get("/", [ProductController::class, "index"]);

//Check For The Quantity
Route::get("/products/{product}/checkQuantity", [ProductController::class, "checkQuantity"]);

//Get Single Product
Route::get("/products/{name}", [ProductController::class, "show"]);
