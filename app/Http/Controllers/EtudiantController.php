<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Ville;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::selectUser();
        $lists = Etudiant::all(); //select * from etudiant
        return view('etudiant.index', ['lists' => $lists, 'user' => $user]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $villes = Ville::selectVille();
        $users = User::selectUser();

        return view('etudiant.create', ['villes' => $villes, 'users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $user = Auth::user(); // Retrieve the currently authenticated user
    $request->validate([
        'nom' => 'required',
        'address' => 'required',
        'phone' => 'required|regex:/^\d{10}$/',
        'date_de_naissance' => 'required|date_format:Y-m-d',
        'ville_id' => 'required|exists:villes,id',
    ]);
    
    $newEtudiant = Etudiant::create([
        'nom' => $request->nom,
        'address' => $request->address,
        'phone' => $request->phone,
        'date_de_naissance' => $request->date_de_naissance,
        'ville_id' => $request->ville_id,
        'user_id' => $user->id, // Set the user ID from the authenticated user
    ]);

    return redirect(route('etudiant.show', $newEtudiant->id));
}


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function show(Etudiant $etudiant)
    {
        return view ('etudiant.show', ['etudiant' => $etudiant]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function edit(Etudiant $etudiant)
    {
        $villes = Ville::selectVille();
        return view('etudiant.edit', ['etudiant' => $etudiant, 'villes' => $villes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        $etudiant->update([
            'nom' => $request->nom,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'date_de_naissance' => $request->date_de_naissance,
            'ville_id' => $request->ville_id,
        ]);

        return redirect(route('etudiant.show', $etudiant));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();

        return redirect(route('list.index'));
    }
}
