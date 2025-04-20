<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\detail;
use App\Models\santri;
use App\Models\Kamar;
use App\Models\Kelas;
use App\Models\SantriDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SantriController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
    
        $santris = Santri::with(['user', 'kamar', 'kelas', 'santriDetail']) // Tambahkan santriDetail di sini
            ->when($search, function ($query, $search) {
                $query->whereHas('user', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                })
                ->orWhere('nis', 'like', "%{$search}%")
                ->orWhere('alamat', 'like', "%{$search}%")
                ->orWhereHas('kelas', function ($q) use ($search) {
                    $q->where('nama', 'like', "%{$search}%");
                });
            })
            ->paginate(10)
            ->withQueryString();
    
        return view('template.admin.datasantri', compact('santris', 'search'));
    }
            
    public function create()
    {
        $kelas = Kelas::all();  // Mengambil semua data kelas
    $kamar = Kamar::all();  // Mengambil semua data kamar

        return view('template.admin.santriTambah', compact('kelas', 'kamar'));
    }
    public function store(Request $request)
    {
        // Simpan User
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => 'santri'
        ]);
    
        // Simpan Santri
        $santri = Santri::create([
            'user_id' => $user->id,
            'no_induk_santri' => $request->input('no_induk_santri'),
            'nis' => $request->input('nis'),
            'kelas_id' => $request->input('kelas_id'), // ✅ Tambahkan ini
            'kelas_sekolah' => $request->input('kelas_sekolah'),
            'alamat' => $request->input('alamat'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'no_hp' => $request->input('no_hp'),
            'nama_ayah' => $request->input('nama_ayah'),
            'nama_ibu' => $request->input('nama_ibu'),
            'nama_wali' => $request->input('nama_wali'),
            'status' => 'aktif',
            'waktu_masuk' => $request->input('waktu_masuk'),
            'waktu_keluar' => $request->input('waktu_keluar'),
            'kamar_id' => $request->input('kamar_id'), // ✅ pastikan ini juga id
        ]);
            
        // Upload Foto Santri (Opsional)
        if ($request->hasFile('file_foto')) {
            $path = $request->file('file_foto')->store('images/santri', 'public');
        } else {
            $path = null;
        }
    
        // Simpan ke Santri Detail
        SantriDetail::create([
            'santri_id' => $santri->id,
            'tanggal_daftar' => $request->input('tanggal_daftar'), // Pastikan format Y-m-d
            'file_foto' => $path,
            'daftar_ulang' => (bool) $request->input('daftar_ulang', false), // Konversi ke boolean
            'status' => 'aktif', // Pastikan nilai sesuai enum
        ]);
    
        return redirect()->route('template.admin.datasantri')->with('success', 'Santri berhasil ditambahkan!');
    }
    
    public function edit($id)
    {
        $santri = Santri::with('user', 'kelas', 'kamar')->findOrFail($id);
        $kelas = Kelas::all();
        $kamar = Kamar::all();
    
        return view('template.admin.santriEdit', compact('santri', 'kelas', 'kamar'));
    }
    
    public function update(Request $request, $id)
    {
        $santri = Santri::findOrFail($id);
        $santriDetail = $santri->SantriDetail; // Mengambil relasi SantriDetail
    
        // Validasi request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'no_induk_santri' => 'required|string|max:255',
            'nis' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id',
            'alamat' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'no_hp' => 'required|string',
            'nama_ayah' => 'required|string',
            'nama_ibu' => 'required|string',
            'status' => 'required|in:aktif,alumni',
            'tanggal_daftar' => 'required|date',
            'file_foto' => 'nullable|image|max:2048', // Validasi untuk foto
        ]);
    
        // Update data user
        $user = $santri->user;
        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $request->password ? bcrypt($request->password) : $user->password, // Password jika diubah
        ]);
    
        // Update data santri
        $santri->update([
            'no_induk_santri' => $validated['no_induk_santri'],
            'nis' => $validated['nis'],
            'kelas_id' => $validated['kelas_id'],
            'alamat' => $validated['alamat'],
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'no_hp' => $validated['no_hp'],
            'nama_ayah' => $validated['nama_ayah'],
            'nama_ibu' => $validated['nama_ibu'],
            'status' => $validated['status'],
            'tanggal_daftar' => $validated['tanggal_daftar'],
            'daftar_ulang' => $request->has('daftar_ulang') ? true : false,
            'waktu_masuk' => $request->waktu_masuk,
            'waktu_keluar' => $request->waktu_keluar,
        ]);
    
        // Cek jika ada foto baru dan update di SantriDetail
        if ($request->hasFile('file_foto')) {
            // Hapus foto lama jika ada
            if ($santriDetail->file_foto) {
                Storage::delete('public/foto/' . $santriDetail->file_foto);
            }
    
            // Simpan foto baru
            $filename = $request->file('file_foto')->store('foto', 'public');
            $santriDetail->update(['file_foto' => basename($filename)]);
        }
    
        return redirect()->route('template.admin.datasantri')->with('success', 'Data santri berhasil diperbarui');
    }
                
    public function destroy($id)
    {
        // Mulai transaksi database
        DB::transaction(function () use ($id) {

            $santri = Santri::findOrFail($id);

            $user = User::findOrFail($santri->user_id);

            $santriDetail = SantriDetail::where('santri_id', $santri->id)->first();
            if ($santriDetail) {
                $santriDetail->delete();
            }

            $santri->delete();
            $user->delete();
        });
        return redirect()->route('template.admin.datasantri')->with('success', 'Data santri berhasil dihapus!');
}

public function search(Request $request)
{
    $query = $request->query('query');

    $santris = Santri::with('user')
        ->whereHas('user', function($q) use ($query) {
            $q->where('name', 'like', "%{$query}%");
        })
        ->limit(5)
        ->get();

    return response()->json($santris->map(function ($santri) {
        return [
            'id' => $santri->id,
            'name' => $santri->user->name
        ];
    }));
}



}