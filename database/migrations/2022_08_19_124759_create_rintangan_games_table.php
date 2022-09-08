<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rintangan_games', function (Blueprint $table) {
            $table->id();
            $table->string('images');
            $table->string('judul');
            $table->string('level');
            $table->string('jawaban');
            $table->string('required')->nullable();
            $table->integer('waktu')->nullable();
            $table->string('warna')->nullable();
            // $table->time('waktu');
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('rintangan_games');
    }
};
