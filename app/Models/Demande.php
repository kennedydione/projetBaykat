<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    protected $fillable = [
        'client_id',
        'agriculteur_id',
        'annonce_id',
        'statut',
        'nom',
        'email',
        'message',
        'quantite',
    ];
    public function annonce()
    {
        return $this->belongsTo(Annonce::class);
    }


    public function client() {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function agriculteur() {
        return $this->belongsTo(User::class, 'agriculteur_id');
    }

}
