<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pilih_tugas extends Model
{
    use HasFactory;

    protected $fillable = [
        'tugas',
        'waktu',
        'status',
        'bukti_tugas',
    ];
}
