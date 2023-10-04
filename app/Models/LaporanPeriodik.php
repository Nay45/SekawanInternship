<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPeriodik extends Model
{
    use HasFactory;

    protected $table = 'laporan_periodik';
    protected $fillable = ['waktu', 'total_aktivitas'];
}
