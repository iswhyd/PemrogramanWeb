<?php

namespace App\Http\Controllers;

use App\Models\MenuFavorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class MenuFavoriteController extends Controller
{
    public function index()
    {
        $menus = MenuFavorite::all();
        return response()->json([
            'status' => 'success',
            'data' => $menus
        ], 200);
    }

    public function show($id)
    {
        $menus = MenuFavorite::find($id);
        if ($menus) {
            return response()->json($menus);
        }
        return response()->json(['message' => 'Menu tidak ditemukan'], 404);
    }

    // Method untuk menyimpan menu baru
    public function store(Request $request)
{
    // Validasi input
    $validator = Validator::make($request->all(), [
        'nama_menu' => 'required|string|max:255',
        'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // Jika validasi gagal
    if ($validator->fails()) {
        return response()->json([
            'status' => 'error',
            'message' => 'Validation failed',
            'errors' => $validator->errors(),
        ], 422);
    }

    // Ambil file gambar
    $file = $request->file('gambar');

    // Dapatkan nama asli file
    $originalName = $file->getClientOriginalName();

    // Simpan gambar dengan nama asli di direktori public/images
    $file->move(public_path('images'), $originalName);

    // Buat menu baru
    $menu = MenuFavorite::create([
        'nama_menu' => $request->nama_menu,
        'gambar' => 'images/' . $originalName, // Simpan nama file asli
        'link_whatsapp' => 'https://wa.me/+6285975305091?text=Hallo%20Yaa%20Steak%2C%20Saya%20Ingin%20Membeli%20Paket%20Promo%2040%20Persen-nya',
        'link_gofood' => 'https://gofood.link/a/KZgXzH7',
    ]);

    // Kembalikan respons sukses
    return response()->json([
        'status' => 'success',
        'message' => 'Data successfully saved',
        'data' => $menu,
    ], 201);
}

public function update(Request $request, $id)
{
    // Validasi input
    $validator = Validator::make($request->all(), [
        'nama_menu' => 'nullable|string|max:255', // Nama menu opsional
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Gambar opsional
    ]);

    // Jika validasi gagal
    if ($validator->fails()) {
        return response()->json([
            'status' => 'error',
            'message' => 'Validation failed',
            'errors' => $validator->errors(),
        ], 422);
    }

    // Cari menu berdasarkan ID
    $menu = MenuFavorite::findOrFail($id);

    // Perbarui nama menu jika ada
    if ($request->has('nama_menu')) {
        $menu->nama_menu = $request->nama_menu;
    }

    // Jika ada gambar baru, hapus gambar lama dan simpan yang baru
    if ($request->hasFile('gambar')) {
        // Hapus gambar lama jika ada
        if ($menu->gambar && file_exists(public_path($menu->gambar))) {
            unlink(public_path($menu->gambar)); // Menghapus gambar dari server
        }

        // Ambil file gambar
        $file = $request->file('gambar');

        // Dapatkan nama asli file
        $originalName = $file->getClientOriginalName();

        // Simpan gambar baru dengan nama asli
        $file->move(public_path('images'), $originalName);
        $menu->gambar = 'images/' . $originalName; // Simpan path gambar baru
    }

    // Simpan perubahan
    $menu->save();

    // Kembalikan respons sukses
    return response()->json([
        'status' => 'success',
        'message' => 'Data successfully updated',
        'data' => $menu,
    ], 200);
}

    // Method untuk menghapus menu berdasarkan ID
    public function destroy($id)
    {
        $menu = MenuFavorite::findOrFail($id);
        
        // Hapus gambar jika ada
        if ($menu->gambar && Storage::disk('public')->exists(str_replace('/storage/', '', $menu->gambar))) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $menu->gambar));
        }

        // Hapus menu
        $menu->delete();

        // Kembalikan respons sukses
        return response()->json([
            'status' => 'success',
            'message' => 'Data successfully deleted',
        ], 204);
    }
}
