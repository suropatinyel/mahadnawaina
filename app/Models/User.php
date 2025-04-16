<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

/**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendEmailVerificationNotification()
    {
        $this->notify(new \App\Notifications\VerifyEmailNotification);
    }

    
    // Relasi
    public function santri()
    {
        return $this->hasOne(Santri::class, 'user_id');
    }

    public function ustadz()
    {
        return $this->hasOne(Ustad::class, 'user_id');
    }

    public function petugas_pembayaran()
    {
        return $this->hasOne(petugaspembayaran::class, 'user_id');
    }

    // Role helper
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isPetugas()
    {
        return $this->role === 'petugas';
    }

    public function isSantri()
    {
        return $this->role === 'santri';
    }

    public function isUstadz()
    {
        return $this->role === 'ustadz';
    }


    
}
