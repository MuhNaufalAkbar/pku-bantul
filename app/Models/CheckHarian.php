<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckHarian extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak sesuai dengan konvensi Laravel
    protected $table = 'check_harian';  // Pastikan nama tabel sesuai di database

    // Tentukan kolom yang dapat diisi
    protected $fillable = [
        'user_id', 'tanggal', 'suhu', 'berat', 'nafsu_makan', 'minum_obat', 'catatan_pete',
    ];

    // Relasi dengan user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

