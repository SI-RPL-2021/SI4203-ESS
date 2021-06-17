<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class artikel extends Model
{
    protected $table = "artikels";
    protected $fillable = ['file','keterangan','judul'];
}
