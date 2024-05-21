<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auteur_ouvrage extends Model
{
    protected $table='auteur_ouvrages';
    protected $primaryKey='id_auteurouvrage';
    public $timestamps = false;
    //public $incrementing = false;
    protected $fillable=[
        'id_auteur',
        'id_ouvrage'
    ];

    use HasFactory;
}
