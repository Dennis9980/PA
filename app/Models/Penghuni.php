<?php

namespace App\Models;

use App\Observers\DetailPenghuniObserver;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penghuni extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'detail_penghuni';
    protected $observers = [DetailPenghuniObserver::class]; // Observer terdaftar

    protected $fillable = [
        'id_user', 'id_kamar_kos', 'tanggal_mulai', 'tanggal_selesai', 'phone', 'address', 'terbayar', 'saldo_laundry', 'dana_kebersihan'
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

    

    public function kamarKos()
    {
        return $this->belongsTo(KamarKos::class, 'id_kamar_kos'); 
        // Assuming you have a 'KamarKos' model
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when(isset($filters['role']) && $filters['role'] === 'penghuni', function ($query) {
            $query->whereHas('user', function ($query) { // Access related 'User' model
                $query->where('role', 'penghuni');
            });
        });
    }
}
