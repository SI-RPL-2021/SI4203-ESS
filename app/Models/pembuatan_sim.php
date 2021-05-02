<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembuatan_sim extends Model
{
    use HasFactory;
    protected $table = "pembuatan_sim";
    protected $guarded = [];

    public function user()
    {
        return $this->hasOne(User::class);
    }

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
}
