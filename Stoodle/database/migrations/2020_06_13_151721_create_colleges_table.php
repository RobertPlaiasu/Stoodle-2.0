<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colleges', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->boolean('admittance');
            $table->boolean('job');
            $table->boolean('social');
            $table->boolean('stress');
            $table->boolean('sport');
            $table->string('university');
            $table->string('county');
            $table->string('profil');
            $table->string('passion');
            $table->string('subject1');
            $table->string('subject2');
            $table->string('subject3');
            $table->string('book');
            $table->foreign('university')->references('name')->on('universities');
            $table->foreign('county')->references('county')->on('counties');
            $table->foreign('profil')->references('profil')->on('profils');
            $table->foreign('passion')->references('passion')->on('passions');
            $table->foreign('subject1')->references('subject')->on('subjects');
            $table->foreign('subject2')->references('subject')->on('subjects');
            $table->foreign('subject3')->references('subject')->on('subjects');
            $table->foreign('book')->references('book')->on('books');
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
        Schema::dropIfExists('colleges');
    }
}
