<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Editeur extends Model
{
    protected $table='editeurs';
    protected $primaryKey='id_editeur';
    public $timestamps = false;

    protected $fillable=[
        'libelle'
    ];

    use HasFactory;

    /**
     * Permet d'accéder aux ouvrages de l'éditeur.
    */
    public function ouvrages() : HasMany
    {
        // L'éditeur a 1 ou plusieurs ouvrages.
        return $this->hasMany(Ouvrage::class, 'id_editeur');
    }
}
