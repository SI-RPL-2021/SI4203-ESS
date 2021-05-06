<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perpanjangan_sim extends Model
{
    use HasFactory;
    protected $table = "perpanjangan_sim";
    protected $guarded = [];
<<<<<<< HEAD
    
    public function user()
    {
        return $this->hasOne(User::class);
=======

    public $dates = ['masa_berlaku'];
    public function sim()
    {
        return $this->belongsTo('App\Models\pembuatan_sim', 'sim_id', 'id');
>>>>>>> 8b71f03d3b1efbdbc5235b93527cd718b8a0feca
    }
}
