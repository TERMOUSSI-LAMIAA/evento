<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evenements extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre',
        'description',
        'date',
        'lieu',
        'duree',
        'nbr_places',
        'acceptation',
        'is_valid',
        'img',
        'prix',
        'categorie_id',
        'organisateur_id',
    ];

    public function categorie()
    {
        return $this->belongsTo(Categories::class);
    }
    
    public function reservations()
    {
        return $this->hasMany(Reservations::class);
    }
}
