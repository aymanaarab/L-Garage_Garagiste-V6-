<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mecanicien extends Model
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
        return $this->belongsTo(User::class);
    }
}
