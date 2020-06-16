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
            $table->unsignedBigInteger('subject1_id')->nullable();
            $table->unsignedBigInteger('subject2_id')->nullable();
            $table->unsignedBigInteger('subject3_id')->nullable();
            $table->foreignId('county_id')->constrained()->nullable();
            $table->foreignId('profil_id')->constrained()->nullable();
            $table->foreignId('passion_id')->constrained()->nullable();
            $table->foreignId('book_id')->constrained()->nullable();
            $table->foreign('subject1_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->foreign('subject2_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->foreign('subject3_id')->references('id')->on('subjects')->onDelete('cascade');
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
