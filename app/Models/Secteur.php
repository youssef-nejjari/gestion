<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secteur extends Model
{
    use HasFactory;
    protected $table = 'secteur';
    protected $primaryKey = 'Id';

    protected $fillable = [
        'Libelle'
    ];

    public $timestamps = false;
}
