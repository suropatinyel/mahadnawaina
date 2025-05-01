<?php

namespace App\Http\Controllers;

use App\Models\Ustad;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UstadController extends Controller
{
    // Menampilkan daftar Ustad
    public function index(Request $request)
    {
        $search = $request->search;
    
        // Ambil jumlah per halaman dari query string atau default 10
        $perPage = $request->input('per_page', 10);
        
        $query = Ustad::with('user')
            ->when($search, function ($q) use ($search) {
                $q->where(function ($q) use ($search) {
                    $q->whereHas('user', function ($query) use ($search) {
                        $query->where('name', 'like', "%{$search}%");
                    })
                    ->orWhere('alamat', 'like', "%{$search}%")
                    ->orWhere('mata_pelajaran', 'like', "%{$search}%")
                    ->orWhere('user_id', 'like', "%{$search}%");
                });
            });
    
        // Terapkan pagination berdasarkan jumlah per halaman yang dipilih
        $ustads = $query->paginate($perPage);
    
        return view('template.admin.dataust', compact('ustads', 'search'));
    }
        // Menampilkan form tambah Ustad
    public function create()
    {
        return view('template.admin.ustadzTambah');
    }

    // Menyimpan data Ustad baru
    public function store(Request $request)
    {
            $id = mt_rand(1000000000000000, 9999999999999999);

            // Simpan user terlebih dahulu
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'role' => 'ustadz',
            ]);
        
            // Simpan data ustadz
            $data = [
                'ustadz_id' => $id,
                'user_id' => $user->id, // Hubungkan ke user
                'JK' => $request->input('JK'),
                'No_HP' => $request->input('No_HP'),
                'alamat' => $request->input('alamat'),
                'mata_pelajaran' => $request->input('mata_pelajaran'),
            ];
        
        
            Ustad::create($data);
        
            return redirect()->route('template.admin.dataust')->with('success', 'Data ustadz berhasil ditambahkan!');
    }
    
    public function edit($id)
    {
        $ustadz = Ustad::findOrFail($id);
        return view('template.admin.ustadzEdit', compact('ustadz'));
    }
    
    public function update(Request $request, $id)
    {
        $ustadz = Ustad::findOrFail($id);
        $user = User::findOrFail($ustadz->user_id); // Ambil user yang terkait
    
        // Update user
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password') ? Hash::make($request->input('password')) : $user->password,
        ]);
    
        // Update data ustadz
        $data = [
            'JK' => $request->input('JK'),
            'No_HP' => $request->input('No_HP'),
            'alamat' => $request->input('alamat'),
            'mata_pelajaran' => $request->input('mata_pelajaran'),
        ];
    
    
        $ustadz->update($data);
    
        return redirect()->route('template.admin.dataust')->with('success', 'Data ustadz berhasil diperbarui!');
    }

    public function destroy($id)
    {
        // Cari data ustadz berdasarkan user_id
        $ustadz = Ustad::where('user_id', $id)->first();
    
        // Cek jika data ditemukan
        if ($ustadz) {
            // Hapus data ustadz
            $ustadz->delete();
    
            // Hapus data user terkait jika diperlukan
            $user = User::find($id);
            if ($user) {
                $user->delete();
            }
    
            return redirect()->route('template.admin.dataust')->with('success', 'Data ustadz berhasil dihapus');
        }
    
        return redirect()->route('template.admin.dataust')->with('error', 'Data ustadz tidak ditemukan');
    }
    }