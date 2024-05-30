<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Vehicule
 *
 * @property $id
 * @property $marque
 * @property $modèle
 * @property $type_carburant
 * @property $immatriculation
 * @property $photos
 * @property $clientID
 * @property $created_at
 * @property $updated_at
 *
 * @property Client $client
 * @property RendezVou[] $rendezVouses
 * @property Reparation[] $reparations
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Vehicule extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['marque', 'modèle', 'type_carburant', 'immatriculation', 'photos', 'clientID'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(\App\Models\Client::class, 'clientID', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rendezVouses()
    {
        return $this->hasMany(\App\Models\RendezVou::class, 'id', 'vehiculeID');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reparations()
    {
        return $this->hasMany(\App\Models\Reparation::class, 'id', 'vehiculeID');
    }
    
}
