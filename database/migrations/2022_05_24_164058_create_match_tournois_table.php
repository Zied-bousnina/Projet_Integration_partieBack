<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchTournoisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_tournois', function (Blueprint $table) {
            $table->increments('id_equipe');
            $table->string("name");

            $table->integer('point')->nullable();
            $table->integer('lost')->nullable();
            $table->integer('won')->nullable();
            $table->integer('played')->nullable();
            $table->unsignedInteger('id_tournoi');

            $table->foreign('id_tournoi')->references('id_tournoi')->on('tournois');
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
        Schema::dropIfExists('match_tournois');
    }
}
