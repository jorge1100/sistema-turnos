<?php

use Illuminate\Database\Migrations\Migration; // Clase base para migraciones
use Illuminate\Database\Schema\Blueprint; // Permite definir la estructura de tablas
use Illuminate\Support\Facades\Schema; // Facade para manipular la base de datos

return new class extends Migration
{
    /**
     * Ejecutar las migraciones (crear tablas).
     */
    public function up(): void
    {
        // Crear la tabla 'cache'
        Schema::create('cache', function (Blueprint $table) {
            $table->string('key')->primary();
            // Clave única del cache (identifica cada registro almacenado)

            $table->mediumText('value');
            // Valor almacenado en cache (puede ser datos serializados)

            $table->bigInteger('expiration')->index();
            // Tiempo de expiración del cache (timestamp)
            // index mejora la búsqueda de registros expirados
        });

        // Crear la tabla 'cache_locks'
        Schema::create('cache_locks', function (Blueprint $table) {
            $table->string('key')->primary();
            // Clave única del bloqueo

            $table->string('owner');
            // Identificador del proceso o instancia que posee el bloqueo

            $table->bigInteger('expiration')->index();
            // Tiempo de expiración del bloqueo
            // (permite liberar locks automáticamente)
        });
    }

    /**
     * Revertir las migraciones (eliminar tablas).
     */
    public function down(): void
    {
        // Elimina las tablas si existen (rollback)
        Schema::dropIfExists('cache');
        Schema::dropIfExists('cache_locks');
    }
};