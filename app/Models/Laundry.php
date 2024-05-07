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

    public function scopeSearch($query, $keyword)
    {
        if ($keyword) {
            return $query->whereHas('user', function ($query) use ($keyword) {
                $query->where('name', 'like', "%{$keyword}%");
            });
        }
        return $query; // Mengembalikan query tanpa filter apapun jika tidak ada keyword
    }
    
    protected $table = 'laundry';

    public function user()
    {
        return $this->belongsTo(User::class, 'id_penghuni', 'id');
    }
}
