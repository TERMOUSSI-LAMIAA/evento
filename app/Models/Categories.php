<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre',
        'description',

    ];

    public function evenements()
    {
        return $this->hasMany(Evenements::class);
    }

}
