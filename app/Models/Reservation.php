<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ouvrage;
use App\Models\Utilisateur;

class Reservation extends Model
{
    protected $table='reservations';
    protected $primaryKey='id_reservation';
    public $timestamps = false;
    //public $incrementing = false;
    protected $fillable=[
        'id_reservation',
        'id_ouvrage',
        'id_utilisateur',
        'date_reservation'
    ];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class,'id_utilisateur','id_utilisateur');
    }
    public function ouvrage()
    {
        return $this->belongsTo(Ouvrage::class,'id_ouvrage', 'id_ouvrage');
    }
    use HasFactory;


}
