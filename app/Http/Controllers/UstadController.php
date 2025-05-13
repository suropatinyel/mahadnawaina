<?php

namespace App\Http\Controllers;

use App\Models\Ustad;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\DB;

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

public function exportExcel()
{
    $ustads = Ustad::with('user')->get();

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Header
    $sheet->setCellValue('A1', 'No');
    $sheet->setCellValue('B1', 'Nama');
    $sheet->setCellValue('C1', 'Email');
    $sheet->setCellValue('D1', 'Jenis Kelamin');
    $sheet->setCellValue('E1', 'Alamat');
    $sheet->setCellValue('F1', 'No HP');
    $sheet->setCellValue('G1', 'Mata Pelajaran');

    // Data
    $row = 2;
    $no = 1;
    foreach ($ustads as $ustad) {
        $sheet->setCellValue('A' . $row, $no++);
        $sheet->setCellValue('B' . $row, $ustad->user->name ?? '-');
        $sheet->setCellValue('C' . $row, $ustad->user->email ?? '-');
        $sheet->setCellValue('D' . $row, $ustad->JK ?? '-');
        $sheet->setCellValue('E' . $row, $ustad->alamat ?? '-');
        $sheet->setCellValue('F' . $row, $ustad->No_HP ?? '-');
        $sheet->setCellValue('G' . $row, $ustad->mata_pelajaran ?? '-');
        $row++;
    }

    // Output
    $writer = new Xlsx($spreadsheet);
    $filename = 'data_ustad.xlsx';

    // Download response
    return response()->streamDownload(function () use ($writer) {
        $writer->save('php://output');
    }, $filename);
    }

    public function importExcel(Request $request)
    {
        if (!$request->hasFile('file')) {
            return back()->with('error', 'File tidak dikirim.');
        }
    
        try {
            $file = $request->file('file');
            $spreadsheet = IOFactory::load($file);
            $sheet = $spreadsheet->getActiveSheet();
            $rows = $sheet->toArray();

         
    
            if (count($rows) <= 1) {
                return back()->with('error', 'File kosong atau tidak ada data.');
            }
    
            DB::beginTransaction();
            foreach ($rows as $index => $row) {
                if ($index == 0) continue;
    
                $name   = $row[1] ?? null;
                $email  = $row[2] ?? null;
                $KL  = $row[3] ?? null;
                $alamat = $row[4] ?? null;
                $no_hp  = $row[5] ?? null;
                $mapel  = $row[6] ?? null;
    
                if (!$email || !$name) continue;
    
                $user = User::updateOrCreate(
                    ['email' => $email],
                    ['name' => $name, 'password' => bcrypt('passworddefault'), 'role' => 'ustadz']
                );
                
                Ustad::updateOrCreate(
                    ['user_id' => $user->id],
                    ['alamat' => $alamat, 'No_HP' => $no_hp, 'mata_pelajaran' => $mapel, 'JK'=>$KL]
                );
            }
            DB::commit();
            return back()->with('success', 'Import berhasil!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal import: ' . $e->getMessage());
        }
    }

    }