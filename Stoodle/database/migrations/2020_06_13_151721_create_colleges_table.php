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
            $table->foreignId('university_id')->constrained();
            $table->foreignId('county_id')->constrained();
            $table->foreignId('profil_id')->constrained();
            $table->foreignId('passion_id')->constrained();
            $table->foreignId('book_id')->constrained();
            $table->string('subject1');
            $table->string('subject2');
            $table->string('subject3');
            $table->foreign('subject1')->references('subject')->on('subjects')->onDelete('cascade');
            $table->foreign('subject2')->references('subject')->on('subjects')->onDelete('cascade');
            $table->foreign('subject3')->references('subject')->on('subjects')->onDelete('cascade');
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
