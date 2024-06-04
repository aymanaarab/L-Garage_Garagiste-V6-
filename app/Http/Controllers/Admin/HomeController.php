<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Facture;
use App\Models\Mecanicien;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Provision a new web server.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $users = User::all();
        $clients = Client::all();
        $mecanics = Mecanicien::all();
        $factures = Facture::all();
        $clientCount = Client::count();
        $mechanicCount = Mecanicien::count();
        $vehicleCount = Facture::count();
        return view('admin.index', compact('users', 'clients', 'mecanics', 'factures', 'clientCount', 'mechanicCount', 'vehicleCount'));
    }
}
