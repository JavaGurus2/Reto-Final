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
        Schema::create('descarga_pelicula', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("actor_id");
            $table->unsignedBigInteger("user_id");


            $table->foreign("actor_id")
                ->references("id")
                ->on("actores")
                ->onDelete("CASCADE");


            $table->foreign("user_id")
                ->references("id")
                ->on("users")
                ->onDelete("CASCADE");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('descarga_pelicula');
    }
};
