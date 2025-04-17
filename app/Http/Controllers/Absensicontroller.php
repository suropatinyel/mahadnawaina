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
    public function rekap(Request $request)
    {
        $bulan = $request->input('bulan', now()->month);
        $tahun = $request->input('tahun', now()->year);
        $kelasId = $request->input('kelas_id');
        $kamarId = $request->input('kamar_id');
    
        $query = Presensi::with('santri.user');
    
        $semester = $request->input('semester');
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun', now()->year);
    
        $query = Presensi::with('santri.user');
    
        if ($semester) {
            // Semester 1: Januari - Juni | Semester 2: Juli - Desember
            $startMonth = $semester == 1 ? 1 : 7;
            $endMonth = $semester == 1 ? 6 : 12;
    
            $query->whereMonth('tanggal', '>=', $startMonth)
                  ->whereMonth('tanggal', '<=', $endMonth)
                  ->whereYear('tanggal', $tahun);
        }
    
        if ($bulan) {
            $query->whereMonth('tanggal', $bulan)
                  ->whereYear('tanggal', $tahun);
        }
    
        // Tambahkan filter kelas, kamar, dsb sesuai kebutuhanmu
    
        $rekap = $query->get();
    
    
        // Filter bulan dan tahun
        $query->whereMonth('tanggal', $bulan)
              ->whereYear('tanggal', $tahun);
    
        // Filter kelas
        if ($kelasId) {
            $query->whereHas('santri.kelas', function ($q) use ($kelasId) {
                $q->where('id', $kelasId);
            });
        }
    
        // Filter kamar
        if ($kamarId) {
            $query->whereHas('santri.kamar', function ($q) use ($kamarId) {
                $q->where('id', $kamarId);
            });
        }
    
        $presensis = $query->get();
    
        // Rekap berdasarkan santri
        $rekap = $presensis->groupBy('santri_id')->map(function ($data) {
            return [
                'hadir' => $data->where('status', 'hadir')->count(),
                'izin' => $data->where('status', 'izin')->count(),
                'sakit' => $data->where('status', 'sakit')->count(),
                'alfa' => $data->where('status', 'alfa')->count(),
            ];
        });
    
        $santriIds = $rekap->keys();
        $santris = Santri::whereIn('id', $santriIds)->with('user')->get()->keyBy('id');
    
        $kelasOptions = Kelas::pluck('nama', 'id');
        $kamarOptions = Kamar::pluck('nama', 'id');
    
        return view('template.ust.absenRekap', compact(
            'rekap', 'santris', 'kelasOptions', 'kamarOptions', 'bulan', 'tahun', 'semester'
        ));
        }
    
}
