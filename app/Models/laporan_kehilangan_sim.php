<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporan_kehilangan_sim extends Model
{
    use HasFactory;
    protected $table = "laporan_kehilangan_sim";
    protected $guarded = [];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
