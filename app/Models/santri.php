<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class santri extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'user_id',
        'no_induk_santri',
        'nis',
        'nama',
        'kamar_id',
        'kelas_id',
        'alamat',
        'tanggal_lahir',
        'no_hp',
        'nama_ayah',
        'nama_ibu',
        'nama_wali',
        'status',
        'waktu_masuk',
        'waktu_keluar',
    ];

    // Define the relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship with SantriDetail
    public function santriDetail()
    {
        return $this->hasOne(SantriDetail::class);
    }
    public function pembayarans()
    {
        return $this->hasMany(Pembayaran::class, 'santri_id', 'id');
    }
    
    public function presensi()
    {
        return $this->hasMany(Presensi::class);
    }
    public function kamar()
    {
        return $this->belongsTo(kamar::class, 'kamar_id');
    }
    
    public function kelas()
    {
        return $this->belongsTo(kelas::class, 'kelas_id');
    }
    
}