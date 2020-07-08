<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasestudyTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casestudy_team', function (Blueprint $table) {
            $table->bigInteger('casestudy_id')->unsigned();
            $table->bigInteger('team_id')->unsigned();
            $table->timestamps();
            $table->primary(['casestudy_id', 'team_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('casestudy_team');
    }
}
