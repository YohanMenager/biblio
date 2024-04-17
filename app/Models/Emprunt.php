<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprunt extends Model
{
    protected $table='emprunts';
    protected $primaryKey='id_emprunt';
    public $timestamps = false;
    //public $incrementing = false;
    protected $fillable=[
        
        'id_ouvrage',
        'id_utilisateur',
        'date_emprunt',
        'date_retour_prevue',
        'date_retour_reel'
    ];
    /*
    protected $fillable=[
        'id_emprunt',
        'id_ouvrage',
        'id_utilisateur',
        'date_emprunt',
        'date_retour_prevue',
        'date_retour_reel'
    ];
    */
    use HasFactory;
    public function utilisateur(){
        return $this->belongsTo(Utilisateur::class);
    }
    public function ouvrage(){
        return $this->belongsTo(Ouvrage::class);
    }
}
