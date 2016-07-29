<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStandingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('standings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('league');
            $table->string('team');
            $table->integer('wins');
            $table->integer('loss');
            $table->integer('total_games')->default('1');
            $table->integer('games_left')->unsigned();
            $table->integer('pf')->unsigned();
            $table->integer('pa')->unsigned();
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
        Schema::drop('standings');
    }
}
