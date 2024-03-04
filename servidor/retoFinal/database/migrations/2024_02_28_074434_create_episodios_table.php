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
        Schema::create('episodios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("numero");
            $table->string("archivo");
            $table->string("titulo");
            $table->date("fecha_estreno");
            $table->unsignedBigInteger("duracion");

            $table->text("sinopsis");
            $table->unsignedBigInteger("temporada_id");
            $table->foreign("temporada_id")
                ->references("id")
                ->on("temporadas")
                ->onDelete("CASCADE");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('episodios');
    }
};
