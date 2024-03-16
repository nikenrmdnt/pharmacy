<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembelian extends Model
{
    use HasFactory;
    protected $table = 'pembelian'; 
    protected $fillable = [
        'nonota_beli', 
        'tgl_beli', 
        'total_beli', 
        'id_distributor',
        'id_user',
    ];

    public function fdistributor(){
        // relasi untuk ke distributor
        return $this->belongsTo(distributor::class, 'id_distributor', 'id');
    }
    
    public function fusers(){
        // relasi untuk ke user
        return $this->belongsTo(user::class, 'id_user', 'id');
    }
}
