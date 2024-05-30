<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    use HasFactory;

    protected $fillable = [
        'marque', 'modèle', 'type_carburant', 'immatriculation', 'photos', 'clientID',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'clientID');
    }

    public function reparations()
    {
        return $this->hasMany(Reparation::class, 'vehiculeID');
    }

    public function rendezVous()
    {
        return $this->hasMany(RendezVous::class, 'vehiculeID');
    }
}
