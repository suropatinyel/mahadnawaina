<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{ public function index()
    {
        $beritas = Berita::latest()->paginate(5); // Ambil semua data berita, diurutkan dari yang terbaru
        return view('template.admin.beritaData', compact('beritas')); // Tampilkan view dengan data berita
    }

    public function create()
    {
        return view('template.admin.berita'); // Tampilkan form create
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'tanggal_publikasi' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk file gambar
            'status' => 'required|in:draft,terbit',
        ]);

        // Simpan file gambar jika ada
        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('gambar_berita', 'public');
        }

        // Simpan data berita
        Berita::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal_publikasi' => $request->tanggal_publikasi,
            'gambar' => $gambarPath,
            'status' => $request->status,
        ]);

        return redirect()->route('template.admin.berita.create')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function show($id)
    {
        $berita = Berita::findOrFail($id); // Ambil data berita berdasarkan ID
        return view('template.admin.berita', compact('berita')); // Tampilkan view detail
    }

    public function edit($id)
    {
        $beritas = Berita::findOrFail($id);
        return view('template.admin.beritaEdit', compact('beritas'));
    }
        public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'tanggal_publikasi' => 'required|date',
            'gambar' => 'nullable|file|mimes:jpeg,png,jpg,gif', // Contoh validasi untuk file gambar
            'status' => 'required|in:draft,terbit',
        ]);

        $berita = Berita::findOrFail($id); // Ambil data berita berdasarkan ID

        // Update file gambar jika ada
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($berita->gambar) {
                Storage::delete($berita->gambar);
            }
            $gambarPath = $request->file('gambar')->store('public/gambar_berita');
            $berita->gambar = file_get_contents($request->file('gambar')->getRealPath());
        }

        // Update data berita
        $berita->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal_publikasi' => $request->tanggal_publikasi,
            'status' => $request->status,
        ]);

        return redirect()->route('template.admin.beritaData')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $beritas = Berita::findOrFail($id); // Ambil data berita berdasarkan ID

        // Hapus gambar jika ada
        if ($beritas->gambar) {
            Storage::delete($beritas->gambar);
        }

        $beritas->delete(); // Hapus data berita
        return redirect()->route('template.admin.beritaData')->with('success', 'Berita berhasil dihapus!');
    }

    public function indexb()
    {
        $beritas = Berita::latest()->get(); // OK
        return view('dashboard', compact('beritas')); // OK
    }
}