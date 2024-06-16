<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pilihtugas extends Model
{
    use HasFactory;

    protected $table = 'pilih_tugas';

    protected $fillable = [
        'email',
        'tugas_id',
        'bukti_tugas',
    ];

    public function tugas()
    {
        return $this->belongsTo(Tugas::class, 'tugas_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }
}