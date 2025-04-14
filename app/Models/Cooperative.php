<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Secteur;
use App\Models\Categorie;
use App\Models\Commune;
class Cooperative extends Model
{    
    protected $table = 'cooperative';
    protected $primaryKey = 'Id';
    public $timestamps = false;

   protected $fillable = [
        'NumCop', 'NomFr', 'NomAr', 'Num_Ordre', 'Date_Enre', 'Telephonne', 'NumInscrip', 
        'DateCreation', 'NumAnalytique', 'NbrMem', 'DejaBeneficie', 'Nbr_Benifiement',
        'Adresse', 'Informations', 'NbrCollaborateur', 'Secteur', 'Categorie', 'IdComm'
    ];

  
    

    public function secteur() {
        return $this->belongsTo(Secteur::class, 'Secteur','Id');
    }

    public function categorie() {
        return $this->belongsTo(Categorie::class, 'Categorie','Id');
    }

    public function commune() {
        return $this->belongsTo(Commune::class, 'IdComm','Id');
    }
    use HasFactory;
}
