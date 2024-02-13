<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;

Route::prefix('/admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::prefix("/dashboard")->group(function () {
        Route::get('/', [AdminController::class, 'showDashboard']);
        Route::prefix("/manage_products")->group(function(){
            Route::get("/",[ProductController::class,"index"]);
            Route::post("/create",[ProductController::class,"create"]);
            Route::get("/{product}/edit",[ProductController::class,"edit"]);
            Route::put("/{product}/edit",[ProductController::class,"update"]);
            Route::delete("/",[ProductController::class,"delete"]);
        });
        Route::prefix("/manage_users")->group(function(){
            Route::get("/",[UserController::class,"index"]);
            Route::post("/create",[UserController::class,"create"]);
            Route::get("/{user}/edit",[UserController::class,"edit"]);
            Route::put("/{user}/edit",[UserController::class,"update"]);
            Route::delete("/",[UserController::class,"delete"]);
        });
        Route::prefix("/manage_categories")->group(function(){
            Route::get("/",[CategoriesController::class,"index"]);
            Route::post("/create",[CategoriesController::class,"create"]);
            Route::get("/{category}/edit",[CategoriesController::class,"edit"]);
            Route::put("/{category}/edit",[CategoriesController::class,"update"]);
            Route::delete("/",[CategoriesController::class,"delete"]);
        });
    });
    Route::get('/settings', [AdminController::class, 'showSettings']);
});
