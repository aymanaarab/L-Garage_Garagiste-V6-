<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RendezVous extends Model
{
    use HasFactory;

    protected $fillable = [
        'clientID', 'vehiculeID', 'date_rendez_vous', 'heure_rendez_vous', 'statut', 'etat_vehicule',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'clientID');
    }

    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class, 'vehiculeID');
    }
}

