<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secteur extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'secteur';

    protected $fillable = [
        'SEC_CODE',
        'SEC_LIBELLE',
    ];
}
