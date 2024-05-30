<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PieceDeRechange extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_piece', 'référence_piece', 'fournisseur', 'prix',
    ];

    public function reparations()
    {
        return $this->belongsToMany(Reparation::class, 'reparation_piece')
                    ->withPivot('quantité')
                    ->withTimestamps();
    }
}
