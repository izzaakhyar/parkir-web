<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParkir3Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parkir3', function (Blueprint $table) {
            $table->id();
            $table->string('platNomor', 8)->unique();
            $table->string('ruangParkir', 3)->nullable();
            $table->tinyInteger('sudah_masuk')->default('0');
            $table->tinyInteger('pernah_masuk')->default('0');
            $table->Double('tarif')->default('0.0');
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
        Schema::dropIfExists('parkir3');
    }
}
