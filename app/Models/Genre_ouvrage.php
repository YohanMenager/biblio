<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Genre_ouvrage extends Model
{
    protected $table='ouvrage_genres';
    protected $primaryKey='id_genreouvrage';
    public $timestamps = false;
    //public $incrementing = false;
    protected $fillable=[
    'id_ouvrage',
    'id_genre'
    ];

    use HasFactory;
}
