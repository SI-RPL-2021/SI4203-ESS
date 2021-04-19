<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perpanjangan_pajak extends Model
{
    use HasFactory;
    protected $table = "perpanjangan_pajak";
    protected $guarded = [];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
