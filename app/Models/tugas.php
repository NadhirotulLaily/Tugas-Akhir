<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tugas extends Model
{
    use HasFactory;

    protected $table = 'tugas';
    protected $fillable = [
        'tugas', 'waktu', 'status',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
