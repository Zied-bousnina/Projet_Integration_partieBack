<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class matchTournoi extends Model
{
    use HasFactory;
    protected $fillable= ['name', 'points', 'lost', 'won', 'played','id_tournoi'];

}
