<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerpanjanganStnk extends Model
{
    use HasFactory;
    protected $table = 'perpanjangan_stnk';
    protected $guarded = ['id'];
    public $dates = ['masa_berlaku', 'pajak_berlaku', 'perpanjang_sampai', 'masa_berlaku_sebelumnya'];

    public function stnk()
    {
        return $this->belongsTo('App\Models\pembuatan_stnk', 'stnk_id', 'id');
    }
}
