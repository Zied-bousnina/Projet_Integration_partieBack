<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tournoi extends Model
{
    use HasFactory;
    protected $fillable= ['nomTournoi', 'date', 'lieu', 'type'];
}
