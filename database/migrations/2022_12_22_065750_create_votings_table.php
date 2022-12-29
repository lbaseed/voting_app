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
        Schema::create('votings', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->foreignId('election_id');
            $table->foreignId('polling_unit_id');
            $table->foreignId('user_id');
            $table->integer('registered_voters');
            $table->integer('accredited_voters')->nullable();
            $table->integer('votes_casted')->nullable();
            $table->integer('valid_votes')->nullable();
            $table->integer('invalid_votes')->nullable();
            $table->date('date');
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
        Schema::dropIfExists('votings');
    }
};
