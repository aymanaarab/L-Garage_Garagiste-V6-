<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PieceRechange
 *
 * @property $id
 * @property $nom_piece
 * @property $référence_piece
 * @property $fournisseur
 * @property $prix
 * @property $stock
 * @property $created_at
 * @property $updated_at
 *
 * @property ReparationPiece[] $reparationPieces
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PieceRechange extends Model
{
    use HasFactory;

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nom_piece', 'référence_piece', 'fournisseur', 'prix','stock'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reparationPieces()
    {
        return $this->hasMany(\App\Models\ReparationPiece::class, 'id', 'piece_de_rechangeID');
    }
    public function reparations()
    {
        return $this->belongsToMany(Reparation::class, 'reparation_piece')
                    ->withPivot('quantité')
                    ->withTimestamps();
    }

}
