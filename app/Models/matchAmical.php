<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class matchAmical extends Model
{
    use HasFactory;
    protected $fillable= ['id_equipe1', 'id_equipe2', 'localisation', 'date', 'type'];

}
