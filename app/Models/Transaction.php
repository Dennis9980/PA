<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'transaksi';

    protected $fillable = [
        'nama_pembayar',
        'jumlah_bayar',
        'tujuan_bayar',
        'jenis_transaksi',
        'status',
        'tanggal_pembayaran',
        'no_kamar',
        'no_telpon',
        'email',
        'tgl_masuk',
        'tipe_kos',
        'total_harga',
        'dp',
        'snap_token'
    ];

    public function scopeSearch($query, $keyword)
    {
        return $query->when($keyword, function ($query, $search) {
            return $query->where('nama_pembayar', 'like', '%' . $search . '%');
        });
    }
}
