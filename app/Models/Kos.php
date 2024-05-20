<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kos extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['nama', 'alamat', 'jmlh_kamar', 'fasilitas_laundry', 'fasilitas_kebersihan'];

    public function kamarKos()
    {
        return $this->hasMany(KamarKos::class, 'id_kos');
    }

}
