<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kebersihan extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'kebersihan';
    protected $fillable = [
        'id_penghuni',
        'id_kamar',
        'dana_kebersihan',
        'keterangan',
        'tanggal_kebersihan'
    ];

    public function scopeSearch($query, $keyword)
    {
        if ($keyword) {
            return $query->whereHas('user', function ($query) use ($keyword) {
                $query->where('name', 'like', "%{$keyword}%");
            });
        }
        return $query; // Mengembalikan query tanpa filter apapun jika tidak ada keyword
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_penghuni', 'id');
    }
}
