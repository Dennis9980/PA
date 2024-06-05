<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KamarKos extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['nomor_kamar'];

    public function penghuni()
    {
        return $this->hasOne(Penghuni::class, 'id_kamar_kos'); // Atau hasMany jika satu kamar bisa punya banyak penghuni
    }

}
