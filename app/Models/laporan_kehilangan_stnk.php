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
        return $this->belongsTo(User::class);
    }
    public function stnk()
    {
        return $this->belongsTo('App\Models\pembuatan_stnk', 'stnk_id', 'id');
    }
}
