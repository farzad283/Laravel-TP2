<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Directory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [  
        'titre_fr',
        'titre_en',
        'date',
        'file',
        'etudiant_id',
    ];

    /**
     * Get the student that owns the document.
     */
    public function etudiant()
{
    return $this->belongsTo('App\Models\Etudiant', 'etudiant_id');
}

}
