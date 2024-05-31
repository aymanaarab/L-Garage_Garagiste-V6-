<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Facture
 *
 * @property $id
 * @property $reparationID
 * @property $charges_supplementaires
 * @property $montant_total
 * @property $created_at
 * @property $updated_at
 *
 * @property Reparation $reparation
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Facture extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['reparationID', 'charges_supplementaires', 'montant_total'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reparation()
    {
        return $this->belongsTo(\App\Models\Reparation::class, 'reparationID', 'id');
    }
    
}
