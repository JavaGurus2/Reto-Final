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
        Schema::create('serie_actor', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("serie_id");
            $table->unsignedBigInteger("actor_id");


            $table->foreign("serie_id")
                ->references("id")
                ->on("series")
                ->onDelete("CASCADE");


            $table->foreign("actor_id")
                ->references("id")
                ->on("actores")
                ->onDelete("CASCADE");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('serie_actor');
    }
};
