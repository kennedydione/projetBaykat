<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    protected $fillable = [
        'annonce_id',
        'nom',
        'email',
        'message',
        'quantite',
    ];
    public function annonce()
    {
        return $this->belongsTo(Annonce::class);
    }

}
