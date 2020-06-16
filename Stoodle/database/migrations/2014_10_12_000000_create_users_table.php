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
            $table->string('rank')->default('normal');
            $table->boolean('job')->nullable();
            $table->boolean('social')->nullable();
            $table->boolean('stress')->nullable();
            $table->boolean('sport')->nullable();
            $table->foreignId('county_id')->constrained()->nullable();
            $table->foreignId('profil_id')->constrained()->nullable();
            $table->foreignId('passion_id')->constrained()->nullable();
            $table->foreignId('book_id')->constrained()->nullable();
            $table->timestamps();
        });


        Schema::create('subjects_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subject_id')->constrained();
            $table->foreignId('user_id')->constrained();

            $table->unique(['subject_id','user_id']);

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
        Schema::dropIfExists('subjects_users');
    }
}
