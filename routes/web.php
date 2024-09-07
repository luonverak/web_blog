<?php

use App\Http\Controllers\Blog\Views\BackendViewController;
use App\Http\Controllers\Blog\Views\FrontendViewController;
use App\Http\Controllers\Blog\Views\UserViewController;
use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "admin"], function () {
    Route::get("/", [BackendViewController::class, "index"]);
    Route::get("/category", [BackendViewController::class, "category"]);
});
Route::group(["prefix" => "/"], function () {
    Route::get("/", [FrontendViewController::class, "index"]);
});
Route::group(["prefix" => "user"], function () {
    Route::get("/", [UserViewController::class, "index"]);
});
