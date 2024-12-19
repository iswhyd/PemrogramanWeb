<?php
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\MenuFavoriteController;
use App\Http\Controllers\ControllerGeneral;
use Illuminate\Support\Facades\Route;

Route::get('/', [ControllerGeneral::class, 'index'])->name('yaasteak2');
Route::get('/menus', [MenuFavoriteController::class, 'index'])->name('menus.index'); // Untuk mendapatkan menu favorit
Route::get('/komentar', [KomentarController::class, 'index'])->name('comments.index'); // Untuk mendapatkan komentar
// Optional: Route to handle storing new menu items (API or web)
Route::post('/favorite-menu', [MenuFavoriteController::class, 'store'])->name('yaasteak2-post');

Route::put('/favorite-menu', [MenuFavoriteController::class, 'update'])->name('yaasteak2-put');