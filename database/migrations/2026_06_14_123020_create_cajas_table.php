<?php

use Illuminate\Database\Migrations\Migration; // Clase base para migraciones
use Illuminate\Database\Schema\Blueprint; // Permite definir la estructura de tablas
use Illuminate\Support\Facades\Schema; // Facade para trabajar con la base de datos

return new class extends Migration
{
    /**
     * Ejecutar las migraciones (crear tablas).
     */
    
    public function up(): void
    {
        // Crear la tabla 'cajas'
        Schema::create('cajas', function (Blueprint $table) {
            $table->id();
            // Columna ID autoincremental (clave primaria)

            $table->string('nombre');
            // Nombre de la caja (ej: Caja 1, Caja A, etc.)

            $table->foreignId('user_id')
                ->nullable()
                // Permite que este campo sea null (puede haber cajas sin usuario asignado)

                ->constrained()
                // Crea automáticamente una relación con la tabla 'users'
                // (asume que referencia a users.id)

                ->onDelete('set null');
                // Si el usuario se elimina, el campo user_id se pone en NULL
                // (no elimina la caja)

            $table->timestamps();
            // Crea automáticamente:
            // created_at (fecha de creación)
            // updated_at (última actualización)
        });
    }

    /**
     * Revertir las migraciones (eliminar tablas).
     */
    public function down(): void
    {
        // Elimina la tabla 'cajas' si existe
        Schema::dropIfExists('cajas');
    }
};