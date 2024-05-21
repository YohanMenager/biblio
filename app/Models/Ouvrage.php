<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Genre;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ouvrage extends Model
{
    use HasFactory;
    protected $table='ouvrages';
    protected $primaryKey='id_ouvrage';
    public $timestamps = false;

    protected $fillable=[
        'id_editeur',
        'code_isbn',
        'titre',
        'type',
    ];

    /**
     * Permet d'accéder aux genres de l'ouvrage.
     * Utilise la table pivot 'genre_ouvrages'.
     */
    public function genres() : BelongsToMany{
        return $this->belongsToMany(Genre::class,'genre_ouvrages','id_ouvrage','id_genre');
    }

    /**
     * Permet d'accéder aux éditeurs de l'ouvrage.
     */
    public function editeurs() : BelongsTo{
        return $this->belongsTo(Editeur::class, 'id_editeur');
    }

    /**
     * Permet d'accéder aux auteurs de l'ouvrage.
     */
    public function auteurs(){
        return $this->belongsToMany(Auteur::class,'auteur_ouvrages', 'id_ouvrage', 'id_auteur' );
    }

    /**
     * Permet d'accéder aux commentaires de l'ouvrage.
     */
    public function commentaires(){
        return $this->belongsToMany(Commentaire::class);
    }
}
