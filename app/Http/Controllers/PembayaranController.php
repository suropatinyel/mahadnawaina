<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pembayaran_detail;
use App\Models\Santri;
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

    public function create(Request $request)
    {
        // Jika petugas
        if (auth()->user()->isPetugas()) {
            $search = $request->input('search');
    
            // Ambil data santri yang cocok dengan pencarian
            $santris = Santri::with('user')
                ->when($search, function ($query, $search) {
                    $query->whereHas('user', function ($q) use ($search) {
                        $q->where('name', 'like', '%' . $search . '%');
                    });
                })
                ->get();
    
            return view('template.petugas.santriTambahPembayaran', compact('santris'));
        }
    
        // Jika santri
        if (auth()->user()->isSantri()) {
            $santri = auth()->user()->santri;
            return view('template.santri.santriFoto', compact('santri'));
        }
    
        // Selain itu tidak boleh akses
        abort(403);
    }
    

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'santri_id' => 'required|exists:santris,id',
            'jumlah' => 'numeric|min:0|max:99999999.99',
            'tanggal' => 'required|date',
            'metode_pembayaran' => 'required|in:cash,transfer,qris,beasiswa',
            'file_transaksi' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
            'bulan' => 'required|string',
            'keterangan' => 'nullable|string'
        ]);

        if ($request->metode_pembayaran === 'cash') {
            $validatedData['status_pembayaran'] = 'lunas';
        } else {
            $validatedData['status_pembayaran'] = 'pending';
        }

        $validatedData['kode_transaksi'] = 'TRX-' . strtoupper(uniqid());

        $pembayaran = Pembayaran::create($validatedData);

        $detailData = [
            'pembayaran_id' => $pembayaran->id,
            'keterangan' => $request->input('keterangan'),
        ];

        if ($request->hasFile('file_transaksi')) {
            $path = $request->file('file_transaksi')->store('transaksi', 'public');
            $detailData['file_transaksi'] = $path;
        }

        Pembayaran_detail::create($detailData);

        if (auth()->user()->isPetugas()) {
            return redirect()->route('template.petugas.pembayaranSantri')->with('success', 'Pembayaran berhasil ditambahkan!');
        }

        return back()->with('success', 'Pembayaran berhasil dikirim!');
    }

    public function edit($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
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

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status_pembayaran' => 'required|in:pending,lunas,gagal',
        ]);

        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->status_pembayaran = $request->status_pembayaran;
        $pembayaran->save();

        return redirect()->back()->with('success', 'Status pembayaran berhasil diperbarui.');
    }
}
