<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Reservation extends Model
// {
//     use HasFactory;
//     protected $fillable = [
//         'animal_id',
//         'user_id',
//         'tanggal',
//         'total',
//     ];
//     public function animal()
//     {
//         return $this->belongsTo(Animal::class);
//     }

//     public function user()
//     {
//         return $this->belongsTo(User::class);
//     }

//     public function details()
//     {
//         return $this->hasMany(DetailReservation::class, 'reservasi_id');
//     }
// }




namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'animal_id',
        'user_id',
        'tanggal',
        'total',
    ];

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function details()
    {
        return $this->hasMany(DetailReservation::class,'reservasi_id'); 
    } 
}
