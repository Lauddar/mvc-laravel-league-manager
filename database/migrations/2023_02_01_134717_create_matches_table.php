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
        Schema::create('matches', function (Blueprint $table) {
            $table->comment('');
            $table->integer('league_id')->index('fk_leagues_has_teams1_leagues1_idx');
            $table->integer('local_team')->index('fk_leagues_has_teams1_teams1_idx');
            $table->integer('visiting_team')->index('fk_plays_teams1_idx');
            $table->unsignedInteger('local_goals');
            $table->unsignedInteger('visiting_goals');
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->string('location', 45)->nullable();

            $table->primary(['league_id', 'local_team', 'visiting_team']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches');
    }
};
