<?php

use App\Http\Controllers\Blog\CategoryController;
use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "admin"], function () {
    Route::post("/add-category", [CategoryController::class, "addCategory"]);
    Route::post("/get-category", [CategoryController::class, "getCategory"]);
});
