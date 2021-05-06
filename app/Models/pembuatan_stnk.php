<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembuatan_stnk extends Model
{
    use HasFactory;
    protected $table = "pembuatan_stnk";
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
