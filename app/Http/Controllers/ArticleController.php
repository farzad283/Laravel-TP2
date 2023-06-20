<?php

namespace App\Http\Controllers;


use App\Models\Article;
use App\Models\Etudiant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Barryvdh\DomPDF\Facade as PDF;
use PDF;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = Article::all(); //select * from article
        return view('article.index', ['lists' => $lists]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
{
    $articles = Article::selectArticle();

    return view('article.create', ['articles' => $articles]);
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
        $etudiant = $user->etudiant;
        

        $request->validate([
            'titre_fr' => 'required|min:2|max:50',
            'titre_en' => 'required|min:2|max:50',
            'contenu_fr' => 'required',
            'contenu_en' => 'required',
        ]);


        $newAricle = Article::create([
            'nom' => $request->nom,
            'titre_en' => $request->titre_en,
            'titre_fr' => $request->titre_fr,
            'contenu_en' => $request->contenu_en,
            'contenu_fr' => $request->contenu_fr,
            'date_de_creation' => $request->date_de_creation ? $request->date_de_creation : now(),
            'etudiant_id' => $etudiant->id, // Set the user ID from the authenticated user
        ]);
    
        return redirect(route('article.show',  $newAricle->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $etudiant = $article->etudiant;
        return view('article.show', ['article' => $article, 'etudiant' => $etudiant]);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        {
            return view('article.edit', ['article' => $article]);
        }
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $user = Auth::user(); // Retrieve the currently authenticated user
        $etudiant = $user->etudiant;
        $article->update([
            'nom' => $request->nom,
            'titre_en' => $request->titre_en,
            'titre_fr' => $request->titre_fr,
            'contenu_en' => $request->contenu_en,
            'contenu_fr' => $request->contenu_fr,
            'date_de_creation' => $request->date_de_creation ? $request->date_de_creation : now(),
            'etudiant_id' => $etudiant -> id
        ]);

        return redirect(route('article.show', $article));
    }
 

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        {
            $article->delete();
    
            return redirect(route('article.index'));
        }
    }


    public function showPdf(Article $article){
        $pdf = PDF::loadView('article.show-pdf', ['article' => $article]);

        //return $pdf->download('article.pdf');
        return $pdf->stream('article.pdf');
    }
}
