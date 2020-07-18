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
            $table->boolean('admin')->default(0);
            $table->boolean('job')->nullable()->default(NULL);
            $table->tinyInteger('passion_intensity')->nullable()->default(NULL);
            $table->boolean('social')->nullable()->default(NULL);
            $table->boolean('stress')->nullable()->default(NULL);
            $table->boolean('sport')->nullable()->default(NULL);
            $table->foreignId('county_id')->nullable()->default(NULL)->constrained();
            $table->foreignId('profil_id')->nullable()->default(NULL)->constrained();
            $table->foreignId('passion_id')->nullable()->default(NULL)->constrained();
            $table->foreignId('book_id')->nullable()->default(NULL)->constrained();
            $table->foreignId('subject_id_1')->nullable()->default(NULL)->constrained();
            $table->foreignId('subject_id_2')->nullable()->default(NULL)->constrained();
            $table->foreignId('subject_id_3')->nullable()->default(NULL)->constrained();
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
