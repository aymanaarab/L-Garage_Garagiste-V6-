<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RendezVou
 *
 * @property $id
 * @property $clientID
 * @property $mecanicienId
 * @property $date_rendez_vous
 * @property $heure_rendez_vous
 * @property $statut
 * @property $etat_vehicule
 * @property $created_at
 * @property $updated_at
 *
 * @property Client $client
 * @property Vehicule $vehicule
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class RendezVou extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['clientID', 'mecanicienId', 'date_rendez_vous', 'heure_rendez_vous', 'statut', 'etat_vehicule'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(\App\Models\Client::class, 'clientID', 'id');
    }
    public function mecanicien()
    {
        return $this->belongsTo(\App\Models\Mecanicien::class, 'mecanicienId', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    // public function vehicule()
    // {
    //     return $this->belongsTo(\App\Models\Vehicule::class, 'vehiculeID', 'id');
    // }

}
