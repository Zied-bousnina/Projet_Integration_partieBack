<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_matches', function (Blueprint $table) {
            $table->increments('id_match');

            $table->string('localisation');
            $table->string('type');
            $table->date('date');
            $table->unsignedInteger('id_equipe1');
            $table->unsignedInteger('id_equipe2');
            // $table->unsignedInteger('id_tournoi');
            // id_tournoi

            // $table->unsignedInteger('winner');




            $table->foreign('id_equipe1')->references('id_equipe')->on('equipes');
            $table->foreign('id_equipe2')->references('id_equipe')->on('equipes');



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
        Schema::dropIfExists('all_matches');
    }
}
