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
        Schema::create('historiales', function (Blueprint $table) {
            $table->id();

            $table->foreignId('turno_id')
              ->constrained('turnos')
              ->onDelete('cascade');

            $table->enum('estado', [
                'pendiente',
                'en_atencion',
                'atendido',
                'cancelado'
            ]);

            $table->timestamp('fecha_hora');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historiales');
    }
};
