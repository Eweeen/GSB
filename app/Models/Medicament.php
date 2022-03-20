<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicament extends Model
{
    use HasFactory;

    protected $table = 'medicament';

    protected $fillable = [
        'MED_DEPOTLEGAL ',
        'MED_NOMCOMMERCIAL',
        'FAM_CODE',
        'MED_COMPOSITION',
        'MED_EFFETS',
        'MED_CONTREINDIC',
        'MED_PRIXECHANTILLON',
    ];


    protected $hidden = [
        'MED_DEPOTLEGAL',
    ];
}
