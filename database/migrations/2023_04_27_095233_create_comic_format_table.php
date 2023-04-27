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
        Schema::create('comic_format', function (Blueprint $table) {
            $table->id();

            // ! creo la prima chiave esterna comic_id
            // $table->unsignedBigInteger('comic_id');
            // $table->foreign('comic_id')->references('id')->on('comics');

            // ! creo la seconda chiave esterna format_id
            // $table->unsignedBigInteger('format_id');
            // $table->foreign('format_id')->references('id')->on('formats');

            // ? un modo più breve di scrivere la stessa cosa
            $table->foreignId('comic_id')->constrained();
            $table->foreignId('format_id')->constrained();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comic_format');
    }
};
