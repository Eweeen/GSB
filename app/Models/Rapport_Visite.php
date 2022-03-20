<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rapport_Visite extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'rapport_visite';

    protected $fillable = [
        'VIS_MATRICULE',
        'RAP_NUM',
        'PRA_NUM',
        'RAP_DATE',
        'RAP_BILAN',
        'RAP_MOTIF',
    ];
}
