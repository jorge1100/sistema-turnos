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
        Schema::create('turnos', function (Blueprint $table) {

            $table->id();

            // ✅ DATOS DEL TURNO
            $table->string('numero');
            $table->date('fecha');

            // ✅ ESTADO
            $table->enum('estado', [
                'pendiente',
                'en_atencion',
                'atendido',
                'cancelado'
            ])->default('pendiente');

            // ✅ NOMBRE DEL CLIENTE (IMPORTANTE)
            $table->string('nombre')->nullable();

            // ✅ RELACIONES
            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId('servicio_id')
                ->constrained('servicios')
                ->onDelete('cascade');

            $table->foreignId('caja_id')
                ->nullable()
                ->constrained('cajas')
                ->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('turnos');
    }
};
