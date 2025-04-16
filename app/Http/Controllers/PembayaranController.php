<?php

namespace App\Http\Controllers;

use App\Models\pembayaran;
use App\Models\pembayaran_detail;
use App\Models\santri;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index(Request $request)
    {
        $query = Pembayaran::with(['santri.user', 'pembayaran_detail']);
    
        if ($request->has('search')) {
            $search = $request->search;
            $query->whereHas('santri.user', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            });
        }
    
        $pembayarans = $query->orderBy('tanggal', 'desc')->paginate(2);
    
        return view('template.petugas.pembayaranSantri', compact('pembayarans'));
    }    
    public function create()
    {
        if (auth()->user()->isAdmin()) {
            return redirect()->back()->with('error', 'Admin tidak dapat menambahkan pembayaran.');
        }
    
        if (auth()->user()->isPetugas()) {
            $santris = Santri::with('user')->get();
            return view('pembayaran.create', compact('santris'));
        }
    
        abort(403);
    }
    

    public function store(Request $request)
    {
        // Cek apakah user login adalah petugas
        if (!auth()->user()->isPetugas()) {
            abort(403, 'Anda tidak memiliki izin untuk menambah data pembayaran.');
        }
    
        // Validasi Input
        $validatedData = $request->validate([
            'santri_id' => 'required|exists:santris,id',
            'jumlah' => 'numeric|min:0|max:99999999.99',
            'tanggal' => 'required|date',
            'metode_pembayaran' => 'required|in:cash,transfer,qris,beasiswa',
            'file_transaksi' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
            'bulan' => 'required|string',
            'keterangan' => 'nullable|string'
        ]);
    
        // Jika metode pembayaran cash, otomatis status lunas
        if ($request->metode_pembayaran === 'cash') {
            $validatedData['status_pembayaran'] = 'lunas';
        }
    
        // Generate kode transaksi unik
        $validatedData['kode_transaksi'] = 'TRX-' . strtoupper(uniqid());
    
        // Simpan data pembayaran
        $pembayaran = Pembayaran::create($validatedData);
    
        // Simpan detail
        $detailData = [
            'pembayaran_id' => $pembayaran->id,
            'bulan_dibayar' => $request->input('bulan_dibayar'),
            'keterangan' => $request->input('keterangan'),
        ];
    
        if ($request->hasFile('file_transaksi')) {
            $path = $request->file('file_transaksi')->store('transaksi', 'public');
            $detailData['file_transaksi'] = $path;
        }
    
        pembayaran_detail::create($detailData);
    
        return redirect()->route('template.petugas.pembayaranSantri')->with('success', 'Pembayaran berhasil ditambahkan!');
    }
            
    public function edit($id)
    {
        $pembayaran = Pembayaran::findOrFail($id); // Ambil data pembayaran berdasarkan ID
        $santris = Santri::with('user')->get(); // Ambil semua santri untuk dropdown
    
        return view('template.admin.pembayaranEdit', compact('pembayaran', 'santris'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'santri_id' => 'required|exists:santris,id',
            'jumlah' => 'numeric|min:0|max:99999999.99',
            'tanggal' => 'required|date',
            'status_pembayaran' => 'required|in:pending,lunas,gagal',
            'metode_pembayaran' => 'required|in:cash,transfer,qris,beasiswa',
        ]);
    
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->update([
            'santri_id' => $request->santri_id,
            'jumlah' => $request->jumlah,
            'tanggal' => $request->tanggal,
            'status_pembayaran' => $request->status_pembayaran,
            'metode_pembayaran' => $request->metode_pembayaran,
        ]);
    
        return redirect()->route('template.petugas.pembayaranSantri')->with('success', 'Pembayaran berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->delete();
    
        return redirect()->route('template.petugas.pembayaranSantri')->with('success', 'Pembayaran berhasil dihapus!');
    }
    
}