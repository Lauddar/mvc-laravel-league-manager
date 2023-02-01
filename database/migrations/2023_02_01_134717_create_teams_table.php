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
        Schema::create('teams', function (Blueprint $table) {
            $table->comment('');
            $table->integer('id', true);
            $table->integer('clubs_id')->index('fk_teams_clubs1_idx');
            $table->string('category', 45);
            $table->string('name', 45)->nullable();

            $table->primary(['id', 'clubs_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams');
    }
};
