<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJoueursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('joueurs', function (Blueprint $table) {
            $table->increments('id_joueur');

            $table->string('nom');
            $table->string('prenom');

            // 'depJoueur', 'faculteJoueur', 'class'
            $table->string('depJoueur');
            $table->string('faculteJoueur');
            $table->string('class');
            $table->date('dateNais');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('joueurs');
    }
}
