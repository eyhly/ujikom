<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailReservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'reservasi_id',
        'service_id',
        'dokter_id',
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class, 'reservasi_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'dokter_id');
    }
}
