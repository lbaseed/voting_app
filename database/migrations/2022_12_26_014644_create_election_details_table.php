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
        Schema::create('election_details', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->foreignId('election_id');
            $table->foreignId('political_party_id');
            $table->foreignId('candidate_id');
            $table->integer('total_votes')->nullable();
            $table->integer('position')->nullable();
            $table->boolean('winner')->nullable();
            $table->string('zone')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('election_details');
    }
};
