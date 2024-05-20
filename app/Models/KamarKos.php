<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KamarKos extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['id_kos', 'nomor_kamar'];
    public function kos()
    {
        return $this->belongsTo(Kos::class, 'id_kos');
    }
}
