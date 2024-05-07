<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'role',
        'address',
        'phone',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'id' => 'string'
        ];
    }

    public function scopeFilter($query, array $filters)
    {
        // Role-based filtering
        $query->when(isset($filters['role']) && $filters['role'] === 'penghuni', function ($query) {
            return $query->where('role', 'penghuni');
        });
    
    }

    public function scopeSearch($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
        });
    }


    public function isPenghuni()
    {
        return $this->role === 'penghuni';
    }

    public function penghuni()
    {
        return $this->belongsTo(Penghuni::class, 'id', 'id_user');
    }
    
    public function laundries()
    {
        return $this->hasMany(Laundry::class, 'id_penghuni', 'id');
    }
    public function kebersihan()
    {
        return $this->hasMany(Kebersihan::class, 'id_penghuni', 'id');
    }
}
