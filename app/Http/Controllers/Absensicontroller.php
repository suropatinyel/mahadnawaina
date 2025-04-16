<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use App\Models\Santri;
use App\Models\Kamar;
use App\Models\Kelas;
use Illuminate\Http\Request;

class Absensicontroller extends Controller
{
    // 📌 Tampilkan daftar absensi
    public function index(Request $request)
    {
        $kelasSekolah = $request->input('kelas');
        $kamar = $request->input('kamar');
    
        // Query presensi + relasi santri dan user
        $query = Presensi::with('santri.user');
    
        if ($kelasSekolah) {
            $query->whereHas('santri', function ($q) use ($kelasSekolah) {
                $q->where('kelas_id', $kelasSekolah);
            });
        }
    
        if ($kamar) {
            $query->whereHas('santri', function ($q) use ($kamar) {
                $q->where('kamar_id', $kamar);
            });
        }
    
        $absensis = $query->paginate(10);
    
        // Ambil opsi filter kelas & kamar
        $kelasOptions = \App\Models\Kelas::pluck('nama', 'id');
        $kamarOptions = \App\Models\Kamar::pluck('nama', 'id');
    
        // Pastikan view ini yang kamu render
        return view('template.ust.absen1', compact('absensis', 'kelasOptions', 'kamarOptions'));
    }
            
    // 📌 Tampilkan form tambah absensi
    public function create(Request $request)
    {
        $kelasId = $request->input('kelas');
        $kamarId = $request->input('kamar');
    
        $query = Santri::with('user');
    
        if ($kelasId) {
            $query->where('kelas_id', $kelasId);
        }
    
        if ($kamarId) {
            $query->where('kamar_id', $kamarId);
        }
    
        $santris = $query->get();
    
        // Kirim pilihan filter
        $kelasOptions = Kelas::pluck('nama', 'id');
        $kamarOptions = Kamar::pluck('nama', 'id');
    
        return view('template.ust.absenTambah', compact('santris', 'kelasOptions', 'kamarOptions'));
    }
        
    // 📌 Menyimpan data absensi
    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required|array',
            'status.*' => 'in:hadir,izin,sakit,alfa',
            'keterangan' => 'nullable|array',
            'keterangan.*' => 'nullable|string|max:255',
        ]);
    
        // Simpan absensi ke database
        foreach ($request->input('status', []) as $santri_id => $status) {
            Presensi::create([
                'santri_id' => $santri_id,
                'tanggal' => now(), // Set tanggal otomatis ke hari ini
                'status' => $status,
                'keterangan' => $request->input("keterangan.$santri_id"),
            ]);
        }
    
        return redirect()->route('template.ust.absen1')->with('success', 'Absensi berhasil ditambahkan!');
    }
    
    // 📌 Tampilkan form edit
    public function edit($id)
    {
        $absensi = Presensi::findOrFail($id);  // Cari absensi berdasarkan ID
        $santris = Santri::all();  // Ambil semua data santri
        
        return view('template.ust.absenEdit', compact('absensi', 'santris'));
    }
        
    // 📌 Update absensi
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:hadir,izin,sakit,alfa',
            'keterangan' => 'nullable|string',
        ]);
    
        $absensi = Presensi::findOrFail($id);
        $absensi->update([
            'status' => $request->input('status'),
            'keterangan' => $request->input('keterangan'),
        ]);
    
        return redirect()->route('template.ust.absen1')->with('success', 'Absensi berhasil diperbarui!');
    }
        
    // 📌 Hapus absensi
    public function destroy($id)
    {
        $absensi = Presensi::findOrFail($id);
        $absensi->delete();
    
        return redirect()->route('template.ust.absen1')->with('success', 'Absensi berhasil dihapus!');
    }
}
