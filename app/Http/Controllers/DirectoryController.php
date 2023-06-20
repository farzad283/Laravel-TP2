<?php

namespace App\Http\Controllers;
use App\Models\Article;
use App\Models\Etudiant;
use App\Models\Directory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PDF;


class DirectoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $directories = Directory::with('etudiant')->orderBy('id')->paginate(5);
        return view('directory.index', ['directories' => $directories]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $etudiants = Etudiant::selectEtudiant();

        return view('directory.create', ['etudiants' => $etudiants]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $request->validate([
        'titre_fr' => 'required',
        'titre_en' => 'required',
        'file' => 'required|mimes:pdf,zip,doc',
    ]);
    
    $filePath = $request->file('file')->store('public/documents');
    
    Directory::create([
        'titre_fr' => $request->titre_fr,
        'titre_en' => $request->titre_en,
        'date' => $request->date ? $request->date : now(),
        'file' => $filePath,
        'etudiant_id' => Auth::user()->etudiant->id,
    ]);
    
    return redirect()->route('directory.index')->with('success', 'New directory created successfully!');
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Directory  $directory
     * @return \Illuminate\Http\Response
     */
    public function show(Directory $directory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Directory  $directory
     * @return \Illuminate\Http\Response
     */
    public function edit(Directory $directory)
    {
        return view('directory.edit', ['directory' => $directory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Directory  $directory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Directory $directory)
{
    $user = Auth::user(); // Retrieve the currently authenticated user
    $etudiant = $user->etudiant;
    $request->validate([
        'titre_fr' => 'required',
        'titre_en' => 'required',
        'file' => 'mimes:pdf,doc,zip', // only validate file type if file is uploaded
    ]);

    $filePath = $directory->file; // default to the existing file path

    if ($request->hasFile('file')) {
        // delete the old file from storage
        Storage::disk('public')->delete($directory->file);

        // store the new file
        $filePath = $request->file('file')->store('documents', 'public');

        // update the file path in the directory
        $directory->file = $filePath;
    }

    $directory->update([
        'titre_fr' => $request->titre_fr,
        'titre_en' => $request->titre_en,
        'file' => $filePath,   
        'date' => $request->date_de_creation ? $request->date_de_creation : now(),
        'etudiant_id' => $etudiant -> id, 
    ]);

    $directory->save();

    return redirect(route('directory.index', $directory));
}

    


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Directory  $directory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Directory $directory)
    {
        {
            $directory->delete();
    
            return redirect(route('directory.index'));
        }
    }
}
