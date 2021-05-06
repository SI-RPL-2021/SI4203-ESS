<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perpanjangan_sim extends Model
{
    use HasFactory;
    protected $table = "perpanjangan_sim";
    protected $guarded = [];
    
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
