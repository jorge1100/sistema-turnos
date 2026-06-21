<?php

use Illuminate\Database\Migrations\Migration; // Clase base para migraciones
use Illuminate\Database\Schema\Blueprint; // Permite definir columnas y estructura de la tabla
use Illuminate\Support\Facades\Schema; // Facade para trabajar con la base de datos

return new class extends Migration
{
    /**
     * Ejecutar las migraciones (crear tablas).
     */
    
    public function up(): void
    {
        // Crear la tabla 'turnos'
        Schema::create('turnos', function (Blueprint $table) {
            $table->id();
            // ID autoincremental (clave primaria del turno)

            $table->integer('numero');
            // Número del turno (ej: 1, 2, 3...)
            // Es el número que se muestra al usuario

            $table->foreignId('cliente_id')->constrained()->onDelete('cascade');
            // Clave foránea que referencia al cliente
            // constrained() asume tabla 'clientes'
            // onDelete('cascade'): si se elimina el cliente, se eliminan sus turnos

            $table->foreignId('caja_id')->constrained()->onDelete('cascade');
            // Clave foránea que referencia a la caja
            // constrained() asume tabla 'cajas'
            // onDelete('cascade'): si se elimina la caja, se eliminan sus turnos

            $table->enum('estado', ['esperando', 'atendiendo', 'finalizado'])
                ->default('esperando');
            // Campo tipo ENUM con valores posibles:
            // - esperando (estado inicial)
            // - atendiendo
            // - finalizado
            // Por defecto comienza en 'esperando'

            $table->date('fecha');
            // Fecha del turno (solo fecha, sin hora)

            $table->timestamps();
            // Campos automáticos:
            // created_at (fecha creación)
            // updated_at (última actualización)
        });
    }


    /**
     * Revertir las migraciones (eliminar tablas).
     */
    public function down(): void
    {
        // Elimina la tabla 'turnos' si existe
        Schema::dropIfExists('turnos');
    }
};