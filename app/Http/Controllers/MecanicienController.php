<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use App\Models\Mecanicien;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MecanicienController extends Controller
{
    public function index()
    {
        $mecaniciens = Mecanicien::with('user')->paginate(10);
        return view('mecanicien.index', compact('mecaniciens'));
    }

    public function create()
    {
        return view('mecanicien.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'adresse' => 'required|string|max:255',
            'tel' => 'required|string|max:20',
        ]);

        $user = User::create([
            'name' => $request->firstname . ' ' . $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'editor'
        ]);

        Mecanicien::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'adresse' => $request->adresse,
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'tel' => $request->tel,
            'userId' => $user->id,
        ]);

        return redirect()->route('admin.mecaniciens.index')->with('success', 'Mechanic created successfully.');
    }

    public function show($id)
    {
        $mechanic = Mecanicien::findOrFail($id);
        return view('mecanicien.show', compact('mechanic'));
    }

    public function edit($id)
    {
        $mecanicien = Mecanicien::with('user')->findOrFail($id);
        return view('mecanicien.edit', compact('mecanicien'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'adresse' => 'required',
            'tel' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($id),
            ],
            'password' => 'nullable|min:8|confirmed',
        ]);

        // Find the mecanicien
        $mechanic = Mecanicien::findOrFail($id);

        // Find the corresponding user
        $user = User::findOrFail($mechanic->userId);

        // Update user details
        $user->name = $request->firstname . ' ' . $request->lastname;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        // Update mecanicien details
        $mechanic->firstname = $request->firstname;
        $mechanic->lastname = $request->lastname;
        $mechanic->adresse = $request->adresse;
        $mechanic->tel = $request->tel;
       
        $mechanic->save();

        return redirect()->route('admin.mecaniciens.index')->with('success', 'Mechanic updated successfully.');

    }

    public function destroy($id)
    {
        $mecanicien = Mecanicien::findOrFail($id);
        $mecanicien->delete();

        return redirect()->route('admin.mecaniciens.index')->with('success', 'Mechanic deleted successfully.');
    }
}
