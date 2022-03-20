<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Labo extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'labo';

    protected $fillable = [
        'LAB_CODE',
        'LAB_NOM',
        'LAB_CHEFVENTE',
    ];
}
