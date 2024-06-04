<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'booking';

    protected $fillable = [
        'nama',
        'phone',
        'email',
        'durasi_tinggal',
        'total_harga',
        'status',
        'tipe_kos',
        'Dp',
    ];
}
