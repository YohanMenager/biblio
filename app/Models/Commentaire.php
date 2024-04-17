<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    protected $table='commentaires';
    protected $primaryKey='id_commentaire';
    public $timestamps = false;
    //public $incrementing = false;
    protected $fillable=[
        'id_commentaire',
        'id_ouvrage',
        'id_utilisateur',
        'date_creation',
        'statut',
        'note'
    ];

    use HasFactory;
}
