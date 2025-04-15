<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;


class KelasController extends Controller
{
    public function index()
    {
        // Ambil data kelas dengan pagination, 10 per halaman
        $kelass = Kelas::paginate(10);
        
        // Kirim data kelas ke view
        return view('template.kamar.kelas', compact('kelass'));
    }        public function create()
    {
        return view('template.kamar.kelasTambah');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'tingkat' => 'required|in:7,8,9' // Pastikan tingkat sesuai dengan yang valid
        ]);
    
        // Simpan data kelas ke database
        Kelas::create([
            'nama' => $request->input('nama'),  // Nama kelas
            'tingkat' => $request->input('tingkat') // Tingkat kelas
        ]);
    
        // Redirect dengan pesan sukses
        return redirect()->route('template.kamar.kelas')->with('success', 'Data kelas berhasil ditambahkan.');
    }
    
    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);
        return view('template.kamar.kelasEdit', compact('kelas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tingkat' => 'required|in:7,8,9'
        ]);

        $kelas = Kelas::findOrFail($id);
        $kelas->update($request->only('nama', 'tingkat'));
        return redirect()->route('template.kamar.kelas')->with('success', 'Data kelas berhasil diupdate.');
    }

    public function destroy(Kelas $kelas)
    {
        $kelas->delete();
        return redirect()->route('template.kamar.kelas')->with('success', 'Data kelas berhasil dihapus.');
    }
}