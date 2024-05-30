<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'adresse',
        'tel',
        'email',
        'password',
        'userId',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function vehicules()
    {
        return $this->hasMany(Vehicule::class, 'clientID');
    }

    public function rendezVous()
    {
        return $this->hasMany(RendezVous::class, 'clientID');
    }
}
