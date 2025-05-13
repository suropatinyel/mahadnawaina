<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pembayaran_detail;
use App\Models\Santri;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class PembayaranController extends Controller
{
    public function index(Request $request)
    {
        $query = Pembayaran::query();
    
        // Jika ada pencarian
        if ($request->has('search') && $request->search) {
            $query->whereHas('santri', function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%');
            });
        }
    
        // Jika ada bulan yang dipilih
        if ($request->has('bulan') && $request->bulan != '') {
            $query->where('bulan', $request->bulan);
        }
    
        // Ambil data pembayaran dengan pagination
        $pembayarans = $query->paginate($request->get('perPage', 10));
    
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
        'keterangan' => 'nullable|string',
        'maksud_bayar' => 'required|in:Bulanan,Bukan Bulanan', // ✅ Tambahkan ini
    ]);

    

    if ($request->metode_pembayaran === 'cash') {
        $validatedData['status_pembayaran'] = 'lunas';
    } else {
        $validatedData['status_pembayaran'] = 'pending';
    }

    $validatedData['kode_transaksi'] = 'TRX-' . strtoupper(uniqid());
    $validatedData['maksud_bayar'] = $request->input('maksud_bayar'); // ✅ Simpan jenis pembayaran

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

    // Menampilkan Riwayat Pembayaran
public function showRiwayat($santriId)
{
    // Ambil data santri beserta riwayat pembayarannya, lalu paginate dengan 10 data per halaman
    $santri = Santri::with('pembayarans')->findOrFail($santriId);
    $pembayarans = $santri->pembayarans()->paginate(10); // Menambahkan paginate untuk 10 data per halaman

    // Tampilkan halaman riwayat pembayaran
    return view('template.santri.riwayat', compact('santri', 'pembayarans'));
}


public function downloadRiwayatPdf($santriId)
{
    // Ambil data santri dan riwayat pembayarannya
    $santri = Santri::with('pembayarans', 'user')->findOrFail($santriId);
    $pembayarans = $santri->pembayarans;

    // Generate PDF dari view riwayat
    $pdf = Pdf::loadView('template.santri.riwayatPdf', compact('santri', 'pembayarans'));

    // Download file PDF langsung
    return $pdf->download('riwayat-pembayaran.pdf');
}

public function downloadDetailPdf($pembayaranId)
{
    $pembayaran = Pembayaran::with('santri.user')->findOrFail($pembayaranId);

    // Generate PDF untuk pembayaran tertentu
    $pdf = Pdf::loadView('template.santri.riwayatDetailPdf', compact('pembayaran'));

    // Download langsung file PDF
    return $pdf->download('pembayaran-' . $pembayaran->id . '.pdf');
}

 public function export()
    {
        $pembayarans = Pembayaran::with(['santri.user', 'santri.kelas'])->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama Santri');
        $sheet->setCellValue('C1', 'Kelas');
        $sheet->setCellValue('D1', 'Tanggal');
        $sheet->setCellValue('E1', 'Bulan');
        $sheet->setCellValue('F1', 'Jumlah');
        $sheet->setCellValue('G1', 'Kode Transaksi');
        $sheet->setCellValue('H1', 'Maksud');
        $sheet->setCellValue('I1', 'Status');
        $sheet->setCellValue('J1', 'Metode');

        // Data
        $row = 2;
        foreach ($pembayarans as $index => $p) {
            $sheet->setCellValue('A' . $row, $index + 1);
            $sheet->setCellValue('B' . $row, $p->santri->user->name ?? '-');
            $sheet->setCellValue('C' . $row, $p->santri->kelas->nama ?? '-');
            $sheet->setCellValue('D' . $row, $p->tanggal);
            $sheet->setCellValue('E' . $row, $p->bulan);
            $sheet->setCellValue('F' . $row, $p->jumlah);
            $sheet->setCellValue('G' . $row, $p->kode_transaksi);
            $sheet->setCellValue('H' . $row, $p->maksud_bayar);
            $sheet->setCellValue('I' . $row, $p->status_pembayaran);
            $sheet->setCellValue('J' . $row, $p->metode_pembayaran);
            $row++;
        }

        // Output file
        $filename = 'Data_Pembayaran_' . now()->format('Ymd_His') . '.xlsx';
        $writer = new Xlsx($spreadsheet);

        // Simpan sementara ke php://output
        ob_start();
        $writer->save('php://output');
        $excelOutput = ob_get_clean();

        return response($excelOutput)
            ->header('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
            ->header('Content-Disposition', "attachment; filename=\"$filename\"");
    }


}
