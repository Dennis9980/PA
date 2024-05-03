<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laundry extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'id_penghuni',
        'berat',
        'total_harga',
        'tanggal_masuk',
        'tanggal_selesai',
    ];

    protected $table = 'laundry';

    public function user()
    {
        return $this->belongsTo(User::class, 'id_penghuni', 'id');
    }
}
