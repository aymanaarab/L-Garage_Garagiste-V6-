<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('client.index', compact('clients'));
    }

    public function create()
    {
        return view('client.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'tel' => 'required|string|max:15',
        ]);
        $user = User::create([
            'name' => $request->firstname . ' ' . $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user'
        ]);

        Client::create(
            [
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'password' => $request->password,
                'adresse' => $request->adresse,
                'tel' => $request->tel,
                'userId' => $user->id,
            ]
        );

        return redirect()->route('admin.clients.index')->with('success', 'Client created successfully.');
    }

    public function show(Client $client)
    {
        return view('client.show', compact('client'));
    }

    public function edit(Client $client)
    {
        return view('client.edit', compact('client'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'tel' => 'required|string|max:15',
            'email' => 'required |email',
            'password' => 'nullable|min:8|confirmed',
        ]);

        $client = Client::findOrFail($id);
        $user = User::findOrFail($client->userId);
        $user->name = $request->firstname . ' ' . $request->lastname;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        $client->firstname = $request->firstname;
        $client->lastname = $request->lastname;
        $client->adresse = $request->adresse;
        $client->tel = $request->tel;
        $client->email = $request->email;
        if ($request->filled('password')) {
            $client->password = $user->password;
        }
        $client->save();

        return redirect()->route('admin.clients.index')->with('success', 'Client updated successfully.');
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('admin.clients.index')->with('success', 'Client deleted successfully.');
    }
}
