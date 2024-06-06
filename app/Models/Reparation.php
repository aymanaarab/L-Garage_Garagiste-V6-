<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reparation extends Model
{
    use HasFactory;

    protected $fillable = [
        'description', 'statut', 'date_debut', 'date_fin', 'notes_mecanicien', 'notes_client', 'mecanicienID', 'vehiculeID',
    ];

    public function piecesDeRechange()
    {
        return $this->belongsToMany(PieceDeRechange::class, 'reparation_piece')
                    ->withPivot('quantité')
                    ->withTimestamps();
    }

    public function mecanicien()
    {
        return $this->belongsTo(Mecanicien::class, 'mecanicienID');
    }


    public function getMechanicUserIdAttribute()
    {
        return $this->mecanicien->userID;
    }


    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class, 'vehiculeID');
    }

    public function factures()
    {
        return $this->hasMany(Facture::class, 'reparationID');
    }
}
