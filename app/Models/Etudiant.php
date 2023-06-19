<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $table = 'Etudiants'; // Modify the table name to 'Etudiants'

    protected $fillable = [
        'id',
        'nom',
        'address',
        'phone',
        'date_de_naissance',
        'ville_id',
        'user_id'
    ];

    public function etudiantHasVille(){
        return $this->hasOne(Ville::class, 'id', 'ville_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function article()
    {
        return $this->hasMany(Article::class, 'etudiant_id', 'id');
    }


    public static function selectEtudiant()
    {
       
        $etudiants = Etudiant::orderBy('nom')->get(['id', 'nom']);
        return $etudiants;
    }
}
