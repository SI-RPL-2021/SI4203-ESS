<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporan_kehilangan_stnk extends Model
{
    use HasFactory;
    protected $table = "laporan_kehilangan_stnk";
    protected $guarded = [];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
