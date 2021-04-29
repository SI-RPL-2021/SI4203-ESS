<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function status()
    {
        if ($this->status === 1) {
            return "Diproses";
        } elseif ($this->status === 0) {
            return "Ditolak";
        } elseif ($this->status === 2) {
            return "Berhasil";
        }
    }

    protected $fillable = [
        'name',
        'email',
        'password',
        'level'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function laporan_kehilangan_sim()
    // {
    //     return $this->hasOne(laporan_kehilangan_sim::class);
    // }

    // public function laporan_kehilangan_stnk()
    // {
    //     return $this->hasOne(laporan_kehilangan_stnk::class);
    // }
}
