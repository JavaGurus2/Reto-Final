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
        Schema::create('series_categorias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("serie_id");
            $table->unsignedBigInteger("categoria_id");


            $table->foreign("serie_id")
                ->references("id")
                ->on("series")
                ->onDelete("CASCADE");


            $table->foreign("categoria_id")
                ->references("id")
                ->on("categorias")
                ->onDelete("CASCADE");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('series_categorias');
    }
};
