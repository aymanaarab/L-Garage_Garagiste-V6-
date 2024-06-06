<?php

namespace App\Models;

use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function clients()
{
    return $this->hasMany(Client::class);
}
public function mecanicien()
    {
        return $this->hasOne(Mecanicien::class);
    }

    public function isAdmin()
    {
        return $this->hasRole('admin');
    }
    public function isClient()
    {
        return $this->hasRole('user');
    }
    public function isEditor()
    {
        return $this->hasRole('editor');
    }
    public function hasRole($role)
    {
        return $this->getAttribute('role') === $role;
    }
    public function getRedirectRoute()
    {
        if ($this->isEditor()) {
            return ('editor_dashboard');
        } else if ($this->isAdmin()) {
            return ('admin.home');

        }
        else if ($this -> isClient()){
            return ('client_dashboard');
        }
        return RouteServiceProvider::HOME;

    }
}
