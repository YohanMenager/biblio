<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auteur extends Model
{
    protected $table='auteurs';
    protected $primaryKey='id_auteur';
    public $timestamps = false;
    //public $incrementing = false;
    protected $fillable=[
        'id_auteur',
        'nom',
        'prenom'
    ];

    use HasFactory;
}
