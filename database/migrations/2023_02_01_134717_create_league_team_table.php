<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('league_team', function (Blueprint $table) {
            $table->unsignedBigInteger('league_id');
            $table->unsignedBigInteger('team_id');
            $table->integer('punctuation')->nullable()->unsigned();
            $table->integer('position')->nullable()->unsigned();
            $table->integer('victories')->nullable()->unsigned();
            $table->integer('defeats')->nullable()->unsigned();
            $table->integer('ties')->nullable()->unsigned();
            $table->integer('scored_goals')->nullable()->unsigned();
            $table->integer('conceded_goals')->nullable()->unsigned();

            //$table->primary(['league_id', 'team_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('league_has_teams');
    }
};
