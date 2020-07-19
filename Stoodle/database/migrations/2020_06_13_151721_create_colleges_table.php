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
            $table->string('image');
            $table->boolean('admittance');
            $table->boolean('job');
            $table->boolean('social');
            $table->boolean('stress');
            $table->boolean('sport');
            $table->foreignId('university_id')->constrained()->onDelete('cascade');
            $table->foreignId('county_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('profil_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('passion_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('book_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('subject_id_1')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('subject_id_2')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('subject_id_3')->nullable()->constrained()->onDelete('set null');
            $table->string('url');
            $table->longText('description');
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
