<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penghuni extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'detail_penghuni';

    protected $fillable = [
        'tanggal_mulai',
        'tanggal_selesai',
        'status_pembayaran',
    ];

    protected function casts(): array
    {
        return [
            'id' => 'string'
        ];
    }


    public function user()
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }

    // public function kos()
    // {
    //     return $this->belongsTo(Kos::class, 'id_kos'); 
    //     // Assuming you have a 'Kos' model
    // }

    // public function kamarKos()
    // {
    //     return $this->belongsTo(KamarKos::class, 'id_kamar_kos'); 
    //     // Assuming you have a 'KamarKos' model
    // }

    public function scopeFilter($query, array $filters)
    {
        $query->when(isset($filters['role']) && $filters['role'] === 'penghuni', function ($query) {
            $query->whereHas('user', function ($query) { // Access related 'User' model
                $query->where('role', 'penghuni');
            });
        });
    }
}
