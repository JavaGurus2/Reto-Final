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
        Schema::create('descargas_series', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("episodio_id");
            $table->unsignedBigInteger("user_id");


            $table->foreign("episodio_id")
                ->references("id")
                ->on("episodios")
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
        Schema::dropIfExists('descargas_series');
    }
};
