<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'booking';

    protected $fillable = [
        'booking_id',
        'snap_token',
        'nama',
        'phone',
        'email',
        'tanggal_mulai',
        'total_harga',
        'status',
        'tipe_kos',
        'Dp',
    ];
}
