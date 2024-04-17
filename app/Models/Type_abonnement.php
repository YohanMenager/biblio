<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type_abonnement extends Model
{
    protected $table='type_abonnements';
    protected $primaryKey='id_type_abonnement';
    public $timestamps = false;
    //public $incrementing = false;
    protected $fillable=[
        'id_type_abonnement',
        'nom',
        'prix'
    ];

    use HasFactory;
}
