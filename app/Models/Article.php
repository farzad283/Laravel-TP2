<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'titre_fr',
        'titre_en',
        'contenu_fr',
        'contenu_en',
        'date_de_creation',
        'etudiant_id',
    ];

    use HasFactory;
  
    public function etudiant()
{
    return $this->belongsTo(Etudiant::class, 'etudiant_id');
}


    static public function selectArticle()
    {
        $lang = session()->get('localeDB');

        $query = Article::select(
            'id',
            'titre_en',
            'titre_fr',
            'contenu_en',
            'contenu_fr',
            'etudiant_id',
            'date_de_creation',
            DB::raw("(CASE WHEN titre_en IS NULL THEN titre_fr ELSE titre_en END) as titre")
        )
            ->orderBy('titre')
            ->get();
    
        return $query;
    }
    
}

