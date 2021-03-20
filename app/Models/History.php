<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    protected $table = 'history';
    protected $guarded = [];

    // public function laporan_kehilangan_sim()
    // {
    //     return $this->belongsTo(laporan_kehilangan_sim::class);
    // }
    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'user_id', 'id');
    // }
}
