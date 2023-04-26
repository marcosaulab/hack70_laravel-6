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
        Schema::table('comics', function (Blueprint $table) {
            // ! aggiungeremo il nuovo campo user_id alla tabella comics
            // ! user_id è una foreign key (FK)
            $table->unsignedBigInteger('user_id')->after('id'); // ! aggiungo la colonna
            $table->foreign('user_id')->references('id')->on('users'); // ! creo il vincolo cioè la FK
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comics', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // ! prima cancello il vincolo FK
            $table->dropColumn('user_id'); // ! poi cancello la colonna
        });
    }
};
