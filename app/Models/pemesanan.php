<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemesanan extends Model
{
    use HasFactory;
    protected $table = 'pemesanan';
    protected $fillable = [
        'kendaraan', 'driver', 'approval_id'
    ];

    public function approval()
    {
        return $this->hasOne(User::class);
    }
}