<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignMatchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('all_matches', function (Blueprint $table) {
            //
            $table->unsignedInteger('id_equipe1');
            $table->unsignedInteger('id_equipe2');
            // $table->unsignedInteger('id_tournoi');
            // id_tournoi

            // $table->unsignedInteger('winner');




            $table->foreign('id_equipe1')->references('id_equipe')->on('equipes');
            $table->foreign('id_equipe2')->references('id_equipe')->on('equipes');
            // $table->foreign('id_tournoi')->references('id_tournoi')->on('tournois');

            // $table->foreign('winner')->references('id_equipe')->on('equipes');
            Schema::enableForeignKeyConstraints();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('all_matches', function (Blueprint $table) {

            Schema::disableForeignKeyConstraints();
            $table->dropForeign(['id_equipe1']);
            $table->dropForeign(['id_equipe2']);

            // $table->dropForeign(['winner'])->nullable();


        });
    }
}
