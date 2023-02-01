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
        Schema::table('matches', function (Blueprint $table) {
            $table->foreign(['league_id'], 'fk_leagues_has_teams1_leagues1')->references(['id'])->on('leagues')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['visiting_team'], 'fk_plays_teams1')->references(['id'])->on('teams')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['local_team'], 'fk_leagues_has_teams1_teams1')->references(['id'])->on('teams')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('matches', function (Blueprint $table) {
            $table->dropForeign('fk_leagues_has_teams1_leagues1');
            $table->dropForeign('fk_plays_teams1');
            $table->dropForeign('fk_leagues_has_teams1_teams1');
        });
    }
};
