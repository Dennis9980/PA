<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kebersihan extends Model
{
    use HasFactory;

    protected $table = 'kebersihan';
    protected $fillable = [
        'id_penghuni',
        'id_kamar',
        'dana_kebersihan',
        'keterangan',
        'tanggal_kebersihan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_penghuni', 'id');
    }
}
