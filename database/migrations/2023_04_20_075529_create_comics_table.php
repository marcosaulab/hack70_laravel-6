<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comics', function (Blueprint $table) {
            $table->id(); // ! crea un id auto_increment e chiave primaria
            $table->string('title');
            $table->string('img');
            $table->string('genre');
            $table->string('editor');
            $table->text('abstract');
            $table->integer('release_year');
            $table->float('price', 4, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comics');
    }
};
