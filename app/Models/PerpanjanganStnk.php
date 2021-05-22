<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerpanjanganStnk extends Model
{
    use HasFactory;
    protected $table = 'perpanjangan_pajak_stnk';
    protected $guarded = ['id'];
    public $dates = ['pajak_berlaku'];

    public function stnk()
    {
        return $this->belongsTo('App\Models\pembuatan_stnk', 'stnk_id', 'id');
    }
}
