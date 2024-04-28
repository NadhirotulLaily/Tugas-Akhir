<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PilihTugas extends Model
{
    use HasFactory;

    protected $table = 'tugas'; // Sesuaikan dengan nama tabel di database jika perlu

    protected $fillable = [
        'user_id', // Misalnya Anda ingin menambahkan informasi user yang memilih tugas
        'tugas_id', // ID dari tugas yang dipilih
        // Tambahkan kolom lain jika diperlukan
    ];

    // Definisikan relasi dengan model Tugas
    public function tugas()
    {
        return $this->belongsTo(Tugas::class, 'tugas_id');
    }
}