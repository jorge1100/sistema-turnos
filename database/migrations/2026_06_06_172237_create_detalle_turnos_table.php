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
        Schema::create('detalle_turnos', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('turno_id')
              ->constrained('turnos')
              ->onDelete('cascade');

            $table->string('comentario')->nullable();
            $table->integer('tiempo_estimado')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_turnos');
    }
};
