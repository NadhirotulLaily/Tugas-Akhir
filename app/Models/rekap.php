<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekap extends Model
{
    use HasFactory;

    protected $table = 'rekap';
    protected $fillable = [
        'nama', 'nim', 'semester', 'kompen','email'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }
}
