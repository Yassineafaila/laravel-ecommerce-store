<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;

Route::prefix('/admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get("/profile", [ProductController::class, "showProfile"]);
    Route::prefix("/dashboard")->group(function () {
        Route::get('/', [AdminController::class, 'showDashboard']);
        Route::prefix("/manage_products")->group(function () {
            Route::get("/", [ProductController::class, "index"]);
            Route::get("/categories", [ProductController::class, "getAllCategories"]);
            Route::get("/create", [ProductController::class, "create"]);
            Route::post("/create", [ProductController::class, "store"]);
            Route::get("/{product}/edit", [ProductController::class, "edit"]);
            Route::put("/{product}/edit", [ProductController::class, "update"]);
            Route::delete("/{product}/delete", [ProductController::class, "delete"]);
        });
        Route::prefix("/manage_users")->group(function () {
            Route::get("/", [UserController::class, "index"]);
            Route::post("/create", [UserController::class, "create"]);
            Route::get("/{user}/edit", [UserController::class, "edit"]);
            Route::put("/{user}/edit", [UserController::class, "update"]);
            Route::delete("/", [UserController::class, "delete"]);
        });
        Route::prefix("/manage_categories")->group(function () {
            Route::get("/", [CategoriesController::class, "index"]);

            Route::get("/create", [CategoriesController::class, "create"]);
            Route::post("/create", [CategoriesController::class, "store"]);
            Route::get("/{category}/edit", [CategoriesController::class, "edit"]);
            Route::put("/{category}/edit", [CategoriesController::class, "update"]);
            Route::delete("/{category}/delete", [CategoriesController::class, "delete"]);
        });

    });
    Route::get('/settings', [AdminController::class, 'showSettings']);
});
