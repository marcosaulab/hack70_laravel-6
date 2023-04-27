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
            // ! devo aggiungere il nuovo campo category_id alla tabella comics
            $table->unsignedBigInteger('category_id')->after('user_id')->default(1);
            // ! devo dirgli che è un FK: chiave esterna riferita all'id della tabella categories
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comics', function (Blueprint $table) {
            $table->dropForeign(['category_id']); // ! prima cancello il vincolo FK
            $table->dropColumn('category_id'); // ! poi cancello la colonna
        });
    }
};
