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
        Schema::create('peliculas_categorias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("categoria_id");
            $table->unsignedBigInteger("pelicula_id");

            $table->foreign("categoria_id")
                ->references("id")
                ->on("categorias")
                ->onDelete("CASCADE");

            $table->foreign("pelicula_id")
                ->references("id")
                ->on("peliculas")
                ->onDelete("CASCADE");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peliculas_categorias');
    }
};