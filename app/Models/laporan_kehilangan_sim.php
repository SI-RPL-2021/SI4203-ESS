<?php

namespace App\Models;

use Facade\FlareClient\Http\Response;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class laporan_kehilangan_sim extends Model
{
    use HasFactory;
    protected $table = "laporan_kehilangan_sim";
    protected $guarded = [];
    public $dates = ['tanggal_hilang'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sim()
    {
        return $this->belongsTo('App\Models\pembuatan_sim', 'sim_id', 'id');
    }
}
