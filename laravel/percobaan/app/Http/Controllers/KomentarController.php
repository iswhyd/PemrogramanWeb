<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
    public function index()
    {
        $komentars = Komentar::all();
        return response()->json([
            'status' => 'success',
            'data' => $komentars
        ], 200);
    }

    // Menampilkan komentar berdasarkan ID
    public function show($id)
    {
        $komentar = Komentar::find($id);
        if ($komentar) {
            return response()->json($komentar);
        }
        return response()->json(['message' => 'Komentar tidak ditemukan'], 404);
    }

    // Menyimpan komentar baru
        public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'isikomentar' => 'required|string',
        ]);

        // Simpan komentar ke database
        Komentar::create($validated);

        // Redirect kembali ke halaman komentar
        return redirect()->route('yaasteak2')->with('success', 'Komentar berhasil ditambahkan.');
    }


    // Mengupdate komentar berdasarkan ID
    public function update(Request $request, $id)
    {
        $komentar = Komentar::find($id);
        if (!$komentar) {
            return response()->json(['message' => 'Komentar tidak ditemukan'], 404);
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'isikomentar' => 'required|string',
        ]);

        $komentar->update($validated);
        return response()->json(['message' => 'Komentar berhasil diperbarui', 'data' => $komentar]);
    }

    // Menghapus komentar berdasarkan ID
    public function destroy($id)
    {
        $komentar = Komentar::find($id);
        if (!$komentar) {
            return response()->json(['message' => 'Komentar tidak ditemukan'], 404);
        }

        $komentar->delete();
        return response()->json(['message' => 'Komentar berhasil dihapus']);
    }
}
