<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->boolean('job');
            $table->boolean('social');
            $table->boolean('stress');
            $table->boolean('sport');
            $table->foreignId('county_id')->constrained()->onDelete('cascade');
            $table->foreignId('profil_id')->constrained()->onDelete('cascade');
            $table->foreignId('passion_id')->constrained()->onDelete('cascade');
            $table->foreignId('book_id')->constrained()->onDelete('cascade');
        });

        Schema::create('info_subject', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subject_id')->constrained()->onDelete('cascade');
            $table->foreignId('info_user_id')->constrained()->onDelete('cascade');
            $table->unique(['subject_id','info_user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('info_users');
        Schema::dropIfExists('info_subject');
    }
}
