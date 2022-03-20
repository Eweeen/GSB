<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offrir extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'offrir';

    protected $fillable = [
        'VIS_MATRICULE',
        'RAP_NUM',
        'MED_DEPOTLEGAL',
        'OFF_QTE',
    ];

    protected $hidden = [
        'VIS_MATRICULE',
    ];
}
