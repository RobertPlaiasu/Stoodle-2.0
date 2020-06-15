<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->boolean('job');
            $table->boolean('social');
            $table->boolean('stress');
            $table->boolean('sport');
            $table->string('county');
            $table->string('profil');
            $table->string('passion');
            $table->string('subject1');
            $table->string('subject2');
            $table->string('subject3');
            $table->string('book');
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
        Schema::dropIfExists('users');
    }
}
