<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Annonce extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'titre',
        'description',
        'prix',
        'poids',
        'status',
        'agriculteur_id',
    ];
    public function demandes()
    {
        return $this->hasMany(Demande::class);
    }

    public function agriculteur()
    {
        return $this->belongsTo(User::class, 'agriculteur_id');
    }

}
