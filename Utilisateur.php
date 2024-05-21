<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Utilisateur extends Model
{
    protected $table='utilisateurs';
    protected $primaryKey='id_utilisateur';
    public $timestamps = false;
    //public $incrementing = false;
    use HasFactory;
    protected $fillable=[
        'id_utilisateur',
        'statut',
        'nom',
        'prenom',
        'date_naissance',
        'email',
        'mot_de_passe',
        'adresse',
        'code_postal',
        'ville',
        'reception_newsletter'
    ];
    /*
    protected $fillable=[
        'id_utilisateur',
        'statut',
        'nom',
        'prenom',
        'date_naissance',
        'email',
        'mot_de_passe',
        'adresse',
        'code_postal',
        'ville',
        'reception_newsletter'
    ];
    */
    public function emprunts(): HasMany
    {   //l'utilisateur a 1.* emprunts
        return $this->HasMany(Emprunt::class);
    }
    public function abonnements(): HasMany
    {   //l'utilisateur a 1.* abonnements
        return $this->HasMany(Abonnement::class);
    }
    public function reservations(): HasMany
    {   //l'utilisateur a 1.* reservations
        return $this->HasMany(Reservation::class);
    }
    public function commentaires(): HasMany
    {   //l'utilisateur a 1.* commentaires
        return $this->HasMany(Commentaire::class);
    }
}
