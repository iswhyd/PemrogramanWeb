<?php

namespace App\Http\Controllers;

use App\Models\MenuFavorite;
use App\Models\Komentar;

class ControllerGeneral
{
    // Method untuk mengambil semua menu
    public function index()
    {
        $komentars = Komentar::orderBy('created_at', 'desc')->get();
    
        $menus = MenuFavorite::all();
        return view('yaasteak2', compact('menus','komentars')); // Kirim data ke view
        
    }
}
