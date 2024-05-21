<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abonnement extends Model
{
    protected $table='abonnements';
    protected $primaryKey='id_abonnement';
    public $timestamps = false;
    //public $incrementing = false;

    protected $fillable=[
        'id_abonnement',
        'id_utilisateur',
        'id_type_abonnement',
        'date_debut',
        'date_fin'
    ];
   

    use HasFactory;

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'id_utilisateur');
    }

    public function typeAbonnement()
    {
        return $this->belongsTo(Type_abonnement::class, 'id_type_abonnement');
    }
}
