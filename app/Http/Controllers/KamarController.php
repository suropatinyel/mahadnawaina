<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    
    public function index()
    {
        // Gunakan paginate() untuk pagination
        $kamars = Kamar::paginate(10); // Mengambil 10 data per halaman
     
        // Kirim data kamar ke view
        return view('template.kamar.kamar', compact('kamars'));
    }    
        public function create()
        {
            return view('template.kamar.kamarTambah');
        }
    
        public function store(Request $request)
        {
            $request->validate(['nama' => 'required|string|max:255']);
            Kamar::create($request->only('nama'));
            return redirect()->route('template.kamar.kamar')->with('success', 'Data kamar berhasil ditambahkan.');
        }
    
        public function edit($id)
        {
            $kamar = Kamar::findOrFail($id);
            return view('template.kamar.kamarEdit', compact('kamar'));
        }
    
        public function update(Request $request, $id)
        {
            $request->validate(['nama' => 'required|string|max:255']);

            $kamar = Kamar::findOrFail($id);
            $kamar->update($request->only('nama'));
            return redirect()->route('template.kamar.kamar')->with('success', 'Data kamar berhasil diupdate.');
        }
    
        public function destroy(Kamar $kamar)
        {
            $kamar->delete();
            return redirect()->route('template.kamar.kamar')->with('success', 'Data kamar berhasil dihapus.');
        }
    }