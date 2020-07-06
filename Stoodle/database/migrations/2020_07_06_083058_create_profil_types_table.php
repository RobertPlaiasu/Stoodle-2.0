<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profil_types', function (Blueprint $table) {
            $table->id();
            $table->string('type');
        });

        Schema::create('profil_profil_type', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profil_id')->constrained()->onDelete('cascade');
            $table->foreignId('profil_type_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profil_types');
    }
}
