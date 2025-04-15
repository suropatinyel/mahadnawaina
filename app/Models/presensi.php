<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;

    protected $table = 'presensis';

    protected $primaryKey = 'id';

    protected $fillable = [
        'santri_id',
        'tanggal',
        'status',
        'keterangan',
    ];

    protected $casts = [
        'tanggal' => 'datetime',  // Menambahkan casting ke datetime
    ];

    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }
}
