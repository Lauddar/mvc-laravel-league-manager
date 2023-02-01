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
        Schema::create('league_has_teams', function (Blueprint $table) {
            $table->comment('');
            $table->integer('league_id')->index('fk_leagues_has_teams_leagues_idx');
            $table->integer('team_id')->index('fk_leagues_has_teams_teams1_idx');
            $table->string('punctuation', 45)->nullable();
            $table->string('position', 45)->nullable();
            $table->string('victories', 45)->nullable();
            $table->string('defeats', 45)->nullable();
            $table->string('ties', 45)->nullable();
            $table->string('scored_goals', 45)->nullable();
            $table->string('conceded_goals', 45)->nullable();

            $table->primary(['league_id', 'team_id']);
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