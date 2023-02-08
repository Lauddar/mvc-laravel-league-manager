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
        Schema::table('league_team', function (Blueprint $table) {
            $table->foreign('league_id')->references('id')->on('leagues')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('team_id')->references('id')->on('teams')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('league_has_teams', function (Blueprint $table) {
            $table->dropForeign('fk_leagues_has_teams_leagues');
            $table->dropForeign('fk_leagues_has_teams_teams1');
        });
    }
};
