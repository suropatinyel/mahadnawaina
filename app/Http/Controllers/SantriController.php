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
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class SantriController extends Controller
{
    public function index(Request $request)
    {
        
        $search = $request->input('search');
        
    
        // Ambil input jumlah data per halaman dari user (default 10)
        $perPage = $request->input('per_page', 10);
    
        // Pastikan perPage hanya boleh 10, 50, 100
        $perPage = in_array($perPage, [10, 50, 100]) ? $perPage : 10;
    
        $santris = Santri::with(['user', 'kamar', 'kelas', 'santriDetail'])
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
            ->paginate($perPage)
            ->withQueryString();

            $semua_kelas = Kelas::all();
    
        return view('template.admin.datasantri', compact('santris', 'search', 'perPage', 'semua_kelas'));
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
            'status' => 'baru',
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
            'status' => 'required|in:aktif,alumni,boyong,baru',
            'waktu_masuk' => 'required|date',
            'waktu_keluar' => 'nullable|date',
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
            'waktu_masuk' => $request->waktu_masuk,
            'waktu_keluar' => $request->waktu_keluar ?: $santri->waktu_keluar, // Jika kosong, tetap gunakan nilai sebelumnya
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


public function export(Request $request)
{
    $kelasId = $request->get('kelas_id');

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Set Header Kolom
    $headers = [
        'No', 'no_induk_santri', 'nis', 'nama', 'email', 'kelas', 'kamar',
        'alamat', 'tanggal_lahir', 'no_hp', 'nama_ayah', 'nama_ibu', 'nama_wali',
        'status', 'waktu_masuk', 'waktu_keluar'
    ];
    $sheet->fromArray($headers, null, 'A1');

    // Ambil data santri berdasarkan kelas
    $santris = Santri::with(['user', 'santriDetail', 'kelas', 'kamar'])
        ->whereHas('user', fn ($q) => $q->where('role', 'santri'))
        ->when($kelasId, fn ($query) => $query->where('kelas_id', $kelasId))
        ->get();

    // Tulis data ke file
    $row = 2;
    $no = 1;
    foreach ($santris as $santri) {
        $detail = $santri->santriDetail;
        $sheet->setCellValue('A' . $row, $no++);
        $sheet->setCellValue('B' . $row, $santri->no_induk_santri);
        $sheet->setCellValue('C' . $row, $santri->nis);
        $sheet->setCellValue('D' . $row, $santri->user->name ?? '');
        $sheet->setCellValue('E' . $row, $santri->user->email ?? '');
        $sheet->setCellValue('F' . $row, $santri->kelas->nama ?? ''); // tampilkan nama kelas
        $sheet->setCellValue('G' . $row, $santri->kamar->nama ?? ''); // tampilkan nama kamar
        $sheet->setCellValue('H' . $row, $santri->alamat ?? '');
        $sheet->setCellValue('I' . $row, $santri->tanggal_lahir ?? '');
        $sheet->setCellValue('J' . $row, $santri->no_hp ?? '');
        $sheet->setCellValue('K' . $row, $santri->nama_ayah ?? '');
        $sheet->setCellValue('L' . $row, $santri->nama_ibu ?? '');
        $sheet->setCellValue('M' . $row, $santri->nama_wali ?? '');
        $sheet->setCellValue('N' . $row, $detail->status ?? '');
        $sheet->setCellValue('O' . $row, $santri->waktu_masuk ?? '');
        $sheet->setCellValue('P' . $row, $santri->waktu_keluar ?? '');
        $row++;
    }

    $fileName = 'data_santri_kelas_' . $kelasId . '.xlsx';
    $writer = new Xlsx($spreadsheet);
    $temp_file = tempnam(sys_get_temp_dir(), $fileName);
    $writer->save($temp_file);

    return response()->download($temp_file, $fileName)->deleteFileAfterSend(true);
}





    public function import(Request $request)
    {
        $file = $request->file('file');
        $spreadsheet = IOFactory::load($file);
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray();
    
        DB::beginTransaction();
        try {
            foreach ($rows as $index => $row) {
                if ($index === 0) continue; // Skip header
    
                $no_induk_santri = $row[1] ?? null;
                $nis             = $row[2] ?? null;
                $nama            = $row[3] ?? null;
                $email           = $row[4] ?? null;
                $kelas_id = (int) ($row[5] ?? 0);
                $kamar_id = (int) ($row[6] ?? 0);
                $alamat          = $row[7] ?? null;

                // Misal $row[8] adalah kolom tanggal lahir
                
                $tanggalExcel = $row[8] ?? null;

                if (is_numeric($tanggalExcel)) {
                    // Format Excel (numeric), ubah jadi Carbon
                    $tanggal_lahir = Date::excelToDateTimeObject($tanggalExcel)->format('Y-m-d');
                } else {
                    // Format string, langsung coba parse
                    $tanggal_lahir = Carbon::parse($tanggalExcel)->format('Y-m-d');
                }
                
                $no_hp           = $row[9] ?? null; 
                $nama_ayah       = $row[10] ?? null;
                $nama_ibu        = $row[11] ?? null;
                $nama_wali       = $row[12] ?? null;
                $status          = $row[13] ?? null;
                $tanggal_daftar  = $row[14] ?? null;
                if (is_numeric($tanggal_daftar)) {
                    $tanggal_daftar = Date::excelToDateTimeObject($tanggal_daftar)->format('Y-m-d');
                } else {
                    $tanggal_daftar = Carbon::parse($tanggal_daftar)->format('Y-m-d');
                }

                $waktu_masuk     = $row[15] ?? null;
                                if ($waktu_masuk) {
                    if (is_numeric($waktu_masuk)) {
                        $waktu_masuk = Date::excelToDateTimeObject($waktu_masuk)->format('Y-m-d');
                    } else {
                        $waktu_masuk = Carbon::parse($waktu_masuk)->format('Y-m-d');
                    }
                }
                $waktu_keluar    = $row[16] ?? null;
                if ($waktu_keluar) {
                        if (is_numeric($waktu_keluar)) {
                            $waktu_keluar = Date::excelToDateTimeObject($waktu_keluar)->format('Y-m-d');
                        } else {
                            $waktu_keluar = Carbon::parse($waktu_keluar)->format('Y-m-d');
                        }
                    }

    
 
                // Buat atau ambil user
                $user = User::firstOrCreate(
                    ['email' => $email],
                    ['name' => $nama, 'password' => bcrypt('santri123'), 'role' => 'santri']
                );

                // Cek / buat kelas
           $kelas = Kelas::firstOrCreate([
                'id' => $kelas_id
            ]);

            // Cek / buat kamar
            $kamar = Kamar::firstOrCreate(
                ['id' => $kamar_id],
                ['nama' => 'Kamar ' . $kamar_id]
            );
    
                // Buat data santri
                $santri = Santri::updateOrCreate(
                    ['user_id' => $user->id],
                    [
                        'no_induk_santri' => $no_induk_santri,
                        'nis'=> $nis,
                        'kelas_id'        => $kelas->id,
                        'kamar_id'        => $kamar->id,
                        'alamat'          => $alamat,
                        'tanggal_lahir'   => $tanggal_lahir,
                        'no_hp'           => $no_hp,
                        'nama_ayah'       => $nama_ayah,
                        'nama_ibu'        => $nama_ibu,
                        'nama_wali'       => $nama_wali,
                        'status'          => $status,
                        'waktu_masuk'     => $waktu_masuk,
                        'waktu_keluar'    => $waktu_keluar,
                    ]
                );
    
                // Detail santri
                SantriDetail::updateOrCreate(
                    ['santri_id' => $santri->id],
                    [
                        'status' => $status,
                        'tanggal_daftar' => $tanggal_daftar
                    ]
                );
            }
    
            DB::commit();
            return back()->with('success', 'Import santri berhasil!');
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e; // sementara, agar muncul error jelas
        
        }
    }



}