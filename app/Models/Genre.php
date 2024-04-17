<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use \App\Models\Ouvrage;

class Genre extends Model
{
    protected $table='genres';
    protected $primaryKey='id_genre';
    public $timestamps = false;
    //public $incrementing = false;
    protected $fillable=[
        'id_genre',
        'libelle'
    ];

    use HasFactory;
    public function ouvrages(){
        return $this->belongsToMany(Ouvrage::class,'genre_ouvrages','id_ouvrage','id_genre');
    }
    
}
