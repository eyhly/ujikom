<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = ['nama_hewan', 'jenis_hewan', 'umur'];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
