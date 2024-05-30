<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;

    protected $fillable = [
        'reparationID', 'charges_supplementaires', 'montant_total',
    ];

    public function reparation()
    {
        return $this->belongsTo(Reparation::class, 'reparationID');
    }
}

