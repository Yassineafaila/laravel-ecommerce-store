<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

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

//Display Contact Us page
Route::get("/contact-us", function () {
    return view("pages.ContactUs");
});

Route::middleware('auth')->group(function () {
    Route::post('/products/{product}/like', [ProductController::class, 'likeProduct']);
    Route::post('/products/{product}/unfavorite', [ProductController::class, "unLikedProduct"]);
    Route::get("/products/wish-list", [ProductController::class, "getLikedProducts"]);
    Route::get("/products/cart-shopping", [CartController::class, "index"]);
    Route::post("/products/cart/add-to-cart", [CartController::class, "store"]);
    Route::post("/products/cart/calc-subTotal",[CartController::class,"calcSubTotal"]);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/settings', [ProfileController::class, 'show']);
    Route::post('/settings/update-password', [ProfileController::class, "updatePassword"]);
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//Get Single Product
Route::get("/products/{name}", [ProductController::class, "show"]);
require __DIR__ . '/auth.php';
