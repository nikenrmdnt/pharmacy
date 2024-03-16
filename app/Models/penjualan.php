<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penjualan extends Model
{
    use HasFactory;
    protected $table = 'penjualan'; 
    protected $fillable = [
        'nonota_jual', 
        'tgl_jual', 
        'total_jual', 
        'id_user'
    ];

    public function fusers(){
        // relasi untuk ke user
        return $this->belongsTo(user::class, 'id_user', 'id');
    }
}
