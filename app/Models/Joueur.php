<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joueur extends Model
{
    use HasFactory;
    protected $fillable= ['id_equipe', 'nom', 'prenom', 'dateNais' ,'depJoueur', 'faculteJoueur', 'class'];
}
