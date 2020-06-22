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
            $table->boolean('job')->nullable()->default(NULL);
            $table->boolean('social')->nullable()->default(NULL);
            $table->boolean('stress')->nullable()->default(NULL);
            $table->boolean('sport')->nullable()->default(NULL);
            $table->foreignId('county_id')->nullable()->default(NULL);
            $table->foreignId('profil_id')->nullable()->default(NULL);
            $table->foreignId('passion_id')->nullable()->default(NULL);
            $table->foreignId('book_id')->nullable()->default(NULL);
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
