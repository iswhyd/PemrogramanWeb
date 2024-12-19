<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuFavoriteController;
use App\Http\Controllers\KomentarController;

Route::apiResource('menus', MenuFavoriteController::class);
Route::apiResource('komentar', KomentarController::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
