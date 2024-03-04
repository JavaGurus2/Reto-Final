<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('series', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->text("sinopsis");
            $table->date("fecha_estreno");
            $table->string("clasificacion");
            $table->timestamps();
        });
        DB::statement("ALTER TABLE series ADD imagen LONGBLOB");

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('series');
    }
};
