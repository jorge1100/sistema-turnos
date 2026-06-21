<?php

use Illuminate\Database\Migrations\Migration; // Clase base para migraciones
use Illuminate\Database\Schema\Blueprint; // Permite definir la estructura de las tablas
use Illuminate\Support\Facades\Schema; // Facade para manipular la base de datos

return new class extends Migration
{
    /**
     * Ejecutar las migraciones (crear tablas).
     */
    
    public function up(): void
    {
        // Crea la tabla 'clientes'
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            // Crea una columna ID autoincremental (clave primaria)

            $table->string('nombre');
            // Columna 'nombre' de tipo string (texto corto)
            // Aquí se guarda el nombre del cliente

            $table->timestamps();
            // Crea automáticamente dos columnas:
            // - created_at → fecha de creación
            // - updated_at → fecha de última actualización
        });
    }


    /**
     * Revertir las migraciones (eliminar tablas).
     */
    public function down(): void
    {
        // Elimina la tabla 'clientes' si existe
        Schema::dropIfExists('clientes');
    }
};