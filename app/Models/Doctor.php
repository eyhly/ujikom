<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{

    protected $fillable = [
        'nama_dokter',
        'jam_kerja',
    ];
    public function detailReservations()
    {
        return $this->hasMany(DetailReservation::class, 'dokter_id');
    }

}
