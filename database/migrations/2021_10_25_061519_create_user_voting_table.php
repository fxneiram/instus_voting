<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserVotingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_voting', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('voting_id');
            $table->unsignedInteger('user_id');
            $table->timestamps();

            $table->unique(['voting_id', 'user_id']);

            $table->foreign('voting_id')->references('id')->on('votings');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_voting');
    }
}
