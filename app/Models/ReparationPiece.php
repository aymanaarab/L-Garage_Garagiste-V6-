<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ReparationPiece
 *
 * @property $id
 * @property $reparationID
 * @property $SpartID
 * @property $quantité
 * @property $created_at
 * @property $updated_at
 *
 * @property PieceRechange $pieceRechange
 * @property Reparation $reparation
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ReparationPiece extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['reparationID', 'SpartID', 'quantité'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pieceRechange()
    {
        return $this->belongsTo(\App\Models\PieceRechange::class, 'SpartID', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reparation()
    {
        return $this->belongsTo(\App\Models\Reparation::class, 'reparationID', 'id');
    }

}
