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
        Schema::create('vote_counts', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->foreignId('election_id');
            $table->foreignId('polling_unit_id');
            $table->foreignId('voting_id');
            $table->foreignId('political_party_id');
            $table->foreignId('user_id')->nullable();
            $table->integer('votes');
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
        Schema::dropIfExists('vote_counts');
    }
};
