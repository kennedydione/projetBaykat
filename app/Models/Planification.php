<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'saison',
        'cultures',
        'superficie',
        'sol',
        'date_semis',
    ];

    protected $casts = [
        'cultures' => 'array', // permet de convertir JSON <-> tableau
        'date_semis' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
