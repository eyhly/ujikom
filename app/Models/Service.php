<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

    protected $fillable = [
        'nama_layanan',
        'deskripsi',
        'harga',
    ];
    public function detailReservations()
{
    return $this->hasMany(DetailReservation::class, 'service_id');
}

}
