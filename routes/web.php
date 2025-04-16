<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Events\Verified;
use App\Models\User;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UstadController;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PtgsPembayaranControler;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Routes untuk register & login
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register1');

Route::get('/login', [AuthController::class, 'showLogin'])->name('auth.login');
Route::post('/aclogin', [AuthController::class, 'login'])->name('aclogin');

Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');


Route::middleware(['auth'])->group(function () {
    Route::get('/',[BeritaController::class,'indexb'])->name('dashboard');

    // Dashboard untuk admin
Route::middleware(['auth', 'verified', 'role:admin'])->get('/admin/dashboard', function () {
    return view('template.admin.adminDashboard');
})->name('adminDashboard');

// Dashboard untuk santri
Route::middleware(['auth', 'verified', 'role:santri'])->get('/santri/dashboard', function () {
    return view('template.santri.santriDashboard');
})->name('santriDashboard');

// Dashboard untuk ustad
Route::middleware(['auth', 'verified', 'role:ustadz'])->get('/ustad/dashboard', function () {
    return view('template.ust.ustDashboard');
})->name('ustDashboard');

// Dashboard untuk petugas
Route::middleware(['auth', 'verified', 'role:petugas'])->get('/petugas/dashboard', function () {
    return view('template.petugas.petugasDashboard');
})->name('petugasDashboard');


// Menampilkan halaman verifikasi email
Route::get('/verify-email', [AuthController::class, 'showVerifyEmail'])->name('auth.verify');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});// Routes untuk Ustadz (Hanya Admin yang bisa mengakses)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/ustadz', [UstadController::class, 'index'])->name('template.admin.dataust');
    Route::get('/ustadz/create', [UstadController::class, 'create'])->name('template.admin.ustadzTambah');
    Route::post('/ustadz/store', [UstadController::class, 'store'])->name('ustadz.store');
    Route::get('/ustadz/{id}/edit', [UstadController::class, 'edit'])->name('template.admin.ustadzEdit');
    Route::put('/ustadz/{id}', [UstadController::class, 'update'])->name('ustadz.update');
    Route::delete('/ustadz/{id}', [UstadController::class, 'destroy'])->name('ustadz.destroy');

    Route::get('/kamar', [KamarController::class, 'index'])->name('template.kamar.kamar');
    Route::get('/kamar/create', [KamarController::class, 'create'])->name('template.kamar.kamarTambah');
    Route::post('/kamar/store', [KamarController::class, 'store'])->name('kamar.store');
    Route::get('/kamar/{id}/edit', [KamarController::class, 'edit'])->name('template.kamar.kamarEdit');
    Route::put('/kamar/{id}', [KamarController::class, 'update'])->name('kamar.update');
    Route::delete('/kamar/{id}', [KamarController::class, 'destroy'])->name('kamar.destroy');
    
    Route::get('/kelas', [KelasController::class, 'index'])->name('template.kamar.kelas');
    Route::get('/kelas/create', [KelasController::class, 'create'])->name('template.kamar.kelasTambah');
    Route::post('/kelas/store', [KelasController::class, 'store'])->name('kelas.store');
    Route::get('/kelas/{kelas}/edit', [KelasController::class, 'edit'])->name('template.kamar.kelasEdit');
    Route::put('/kelas/{kelas}', [KelasController::class, 'update'])->name('kelas.update');
    Route::delete('/kelas/{kelas}', [KelasController::class, 'destroy'])->name('kelas.destroy');
});

// Routes untuk Santri (Semua pengguna yang login bisa melihat, tetapi hanya admin yang bisa edit/hapus)
Route::middleware(['auth'])->group(function () {
    Route::get('/santri', [SantriController::class, 'index'])->name('template.admin.datasantri');
    Route::get('/santri/create', [SantriController::class, 'create'])->name('template.admin.santriTambah');
    Route::post('/santri/store', [SantriController::class, 'store'])->name('santri.store');

    // Hanya admin yang bisa edit/hapus data santri
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/santri/{id}/edit', [SantriController::class, 'edit'])->name('template.admin.santriEdit');
        Route::put('/santri/{id}', [SantriController::class, 'update'])->name('santri.update');
        Route::delete('/santri/{id}', [SantriController::class, 'destroy'])->name('santri.destroy');
    });
});

// Routes untuk Petugas Pembayaran (Hanya Admin yang bisa mengakses)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/petugas', [PtgsPembayaranControler::class, 'index'])->name('template.admin.dataPetugas');
    Route::get('/petugas/create', [PtgsPembayaranControler::class, 'create'])->name('template.admin.petugasTambah');
    Route::post('/petugas/store', [PtgsPembayaranControler::class, 'store'])->name('petugas.store');
    Route::get('/petugas/{id}/edit', [PtgsPembayaranControler::class, 'edit'])->name('template.admin.petugasEdit');
    Route::put('/petugas/{id}', [PtgsPembayaranControler::class, 'update'])->name('petugas.update');
    Route::delete('/petugas/{id}', [PtgsPembayaranControler::class, 'destroy'])->name('petugas.destroy');

    Route::get('/berita', [BeritaController::class, 'index'])->name('template.admin.beritaData');
    Route::get('/berita/create', [BeritaController::class, 'create'])->name('template.admin.berita.create');
    Route::post('/berita/store', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('/berita/{id}/edit', [BeritaController::class, 'edit'])->name('template.admin.beritaEdit');
    Route::put('/berita/{id}', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])->name('berita.destroy');
    Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');
});

// Routes untuk Pembayaran (Petugas, Admin, dan Santri bisa melihat, tetapi hanya petugas/admin yang bisa edit/hapus)
Route::middleware(['auth', 'role:petugas|admin'])->group(function () {
    Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('template.petugas.pembayaranSantri');
    Route::get('/pembayaran/create', [PembayaranController::class, 'create'])->name('template.petugas.santriTambahPembayaran');
    Route::post('/pembayaran/store', [PembayaranController::class, 'store'])->name('pembayaran.store');

    // Hanya petugas/admin yang bisa edit/hapus data pembayaran
    Route::middleware(['role:petugas|admin'])->group(function () {
        Route::get('/pembayaran/{id}/edit', [PembayaranController::class, 'edit'])->name('template.admin.pembayaranEdit');
        Route::put('/pembayaran/{id}', [PembayaranController::class, 'update'])->name('pembayaran.update');
        Route::delete('/pembayaran/{id}', [PembayaranController::class, 'destroy'])->name('pembayaran.destroy');
    });
});

Route::middleware(['auth', 'role:santri'])->group(function () {
    Route::get('/santri/pembayaran/tambah', [PembayaranController::class, 'create'])->name('template.santri.santriFoto');
    Route::post('/santri/pembayaran/store', [PembayaranController::class, 'store'])->name('pembayaran.store');
});


// Routes untuk Absensi (Hanya Admin dan Ustadz yang bisa mengakses)
Route::middleware(['auth', 'role:admin|ustadz'])->group(function () {
    Route::get('/absensi', [AbsensiController::class, 'index'])->name('template.ust.absen1');
    Route::get('/absensi/create', [AbsensiController::class, 'create'])->name('template.ust.absenTambah');
    Route::post('/absensi/store', [AbsensiController::class, 'store'])->name('absensi.store');
    Route::get('/absensi/{id}/edit', [AbsensiController::class, 'edit'])->name('absensi.edit');
    Route::put('/absensi/{id}', [AbsensiController::class, 'update'])->name('absensi.update');
    Route::delete('/absensi/{id}', [AbsensiController::class, 'destroy'])->name('absensi.destroy');

});


// Route untuk menampilkan notifikasi verifikasi email
// Route untuk menampilkan notifikasi verifikasi email
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (Request $request, $id, $hash) {
    $user = User::findOrFail($id);

    // Check if hash valid
    if (! hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
        abort(403);
    }

    // Auto login
    Auth::login($user);

    // Mark email as verified
    if (!$user->hasVerifiedEmail()) {
        $user->markEmailAsVerified();
        event(new Verified($user));
    }

    // Redirect ke dashboard sesuai role
    if ($user->role === 'admin') {
        return redirect()->route('adminDashboard');
    } elseif ($user->role === 'petugas') {
        return redirect()->route('petugasDashboard');
    } elseif ($user->role === 'ustadz') {
        return redirect('/ustad/dashboard');
    } elseif ($user->role === 'santri') {
        return redirect()->route('santriDashboard');
    }

    return redirect('/login');
})->middleware(['signed'])->name('verification.verify');

// Route untuk mengirim ulang email verifikasi
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Link verifikasi telah dikirim ulang!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

