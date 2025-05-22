<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Auth\Events\Authenticated;
use App\Models\Santri;

class CreateSantriIfNotExists
{
    public function handle(Authenticated $event): void
    {
        $user = $event->user;

        if (!$user->santri) {
            Santri::create([
                'user_id' => $user->id,
                'no_induk_santri' => 'AUTO-' . $user->id,
                'nis' => 'NIS-' . $user->id,
                'kelas_id' => 1, // <-- pastikan ID 1 ada di tabel kelas
                'kamar_id' => 1, // <-- pastikan ID 1 ada di tabel kamar
                'alamat' => 'Belum diisi',
                'tanggal_lahir' => now()->subYears(13)->format('Y-m-d'), // default umur 13 tahun
                'no_hp' => '08xxxxxxxxxx',
                'nama_ayah' => 'Belum diisi',
                'nama_ibu' => 'Belum diisi',
                'nama_wali' => null,
                'status' => 'baru',
                'waktu_masuk' => now()->format('Y-m-d'),
                'waktu_keluar' => null,
            ]);
        }
    }
}

