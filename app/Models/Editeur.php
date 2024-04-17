<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editeur extends Model
{
    protected $table='editeurs';
    protected $primaryKey='id_editeur';
    public $timestamps = false;
    //public $incrementing = false;
    protected $fillable=[
        'id_editeur',
        'libelle'       
    ];

    use HasFactory;
}
