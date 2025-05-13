<?php

namespace App\Http\Controllers;

use App\Models\petugaspembayaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PtgsPembayaranControler extends Controller
{
    public function index(Request $request)
    {
        $query = PetugasPembayaran::with('user');
    
        // Cek apakah ada query pencarian
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            // Filter berdasarkan nama petugas atau email
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%");
            });
        }
    
        // Ambil data dengan pagination
        $petugas = $query->paginate(5);
        return view('template.admin.dataPetugas', compact('petugas'));
    }
    
    public function create()
    {
        return view('template.admin.petugasTambah');
    }
    public function store(Request $request)
    {
        // Validasi Input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|min:10|max:15',
        ]);
    
        // Simpan User
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => 'petugas'
        ]);
    
        // Simpan Petugas Pembayaran
        PetugasPembayaran::create([
            'user_id' => $user->id,
            'alamat' => $request->input('alamat'),
            'no_hp' => $request->input('no_hp'),
        ]);
    
        return redirect()->route('template.admin.dataPetugas')->with('success', 'Petugas berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $petugas = PetugasPembayaran::findOrFail($id);
        return view('template.admin.petugasEdit', compact('petugas'));
    }


public function update(Request $request, $id)
{
    // Cari Petugas berdasarkan ID
    $petugas = PetugasPembayaran::findOrFail($id);
    $user = User::findOrFail($petugas->user_id);
    
    // Validasi Input
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => [
            'required',
            'email',
            // Hanya melakukan pengecekan unique jika email berubah
            Rule::unique('users')->ignore($user->id), // Abaikan pengecekan duplikat email untuk user yang sedang diupdate
        ],
        'password' => 'nullable|min:6',
        'alamat' => 'required|string',
        'no_hp' => 'required|string|max:15',
    ]);
    
    // Update User terkait
    $user->update([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => $request->filled('password') ? bcrypt($request->input('password')) : $user->password,
    ]);
    
    // Update Data Petugas
    $petugas->update([
        'alamat' => $request->input('alamat'),
        'no_hp' => $request->input('no_hp'),
    ]);
    
    return redirect()->route('template.admin.dataPetugas')->with('success', 'Data Petugas berhasil diperbarui!');
}

    public function destroy($id)
    {
        // Cari petugas berdasarkan ID
        $petugas = PetugasPembayaran::findOrFail($id);
    
        // Hapus user terkait
        $user = User::findOrFail($petugas->user_id);
        $user->delete();
    
        // Hapus petugas
        $petugas->delete();
    
        return redirect()->route('template.admin.dataPetugas')->with('success', 'Petugas berhasil dihapus!');
    }
    
    
}