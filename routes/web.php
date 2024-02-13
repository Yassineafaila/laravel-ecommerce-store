<?php

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

//handle the liked action for a product
// Route::post('/products/{product}/like', [ProductController::class, "likeProduct"])->middleware("auth");



// Route::prefix("dashboard")->middleware(['auth', 'role:admin'])->group(function () {
//     Route::get("/", function () {
//         return view("admin.dashboard");
//     });
// });

Route::middleware('auth')->group(function () {
    Route::post('/products/{product}/like', [ProductController::class, 'likeProduct']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//Get Single Product
Route::get("/products/{name}", [ProductController::class, "show"]);
require __DIR__ . '/auth.php';
