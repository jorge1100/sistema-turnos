<?php

use Illuminate\Database\Migrations\Migration; // Clase base para migraciones
use Illuminate\Database\Schema\Blueprint; // Permite definir las columnas de las tablas
use Illuminate\Support\Facades\Schema; // Facade para manejar la base de datos

return new class extends Migration
{
    /**
     * Ejecutar las migraciones (crear tablas).
     */
    public function up(): void
    {
        // Crear la tabla 'jobs'
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            // ID autoincremental del job

            $table->string('queue')->index();
            // Nombre de la cola (queue) donde se encuentra el job
            // index mejora el rendimiento de búsquedas

            $table->longText('payload');
            // Contenido del job (datos serializados que se ejecutarán)

            $table->unsignedSmallInteger('attempts');
            // Cantidad de intentos que se han hecho para ejecutar este job

            $table->unsignedInteger('reserved_at')->nullable();
            // Timestamp cuando el job fue tomado por un worker (procesador)
            // puede ser null si aún no se procesó

            $table->unsignedInteger('available_at');
            // Timestamp indicando cuándo el job estará disponible para ejecución

            $table->unsignedInteger('created_at');
            // Timestamp de creación del job
        });

        // Crear la tabla 'job_batches'
        Schema::create('job_batches', function (Blueprint $table) {
            $table->string('id')->primary();
            // ID único del lote (batch)

            $table->string('name');
            // Nombre del batch

            $table->integer('total_jobs');
            // Total de jobs en el batch

            $table->integer('pending_jobs');
            // Cantidad de jobs pendientes

            $table->integer('failed_jobs');
            // Cantidad de jobs fallidos

            $table->longText('failed_job_ids');
            // Lista de IDs de jobs que fallaron

            $table->mediumText('options')->nullable();
            // Opciones adicionales del batch

            $table->integer('cancelled_at')->nullable();
            // Timestamp si el batch fue cancelado

            $table->integer('created_at');
            // Fecha de creación del batch

            $table->integer('finished_at')->nullable();
            // Fecha en que terminó el procesamiento del batch
        });

        // Crear la tabla 'failed_jobs'
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();
            // ID del registro fallido

            $table->string('uuid')->unique();
            // Identificador único universal del job

            $table->string('connection');
            // Conexión utilizada (ej: database, redis)

            $table->string('queue');
            // Nombre de la cola

            $table->longText('payload');
            // Datos del job que falló

            $table->longText('exception');
            // Información del error que ocurrió

            $table->timestamp('failed_at')->useCurrent();
            // Fecha en que falló el job

            $table->index(['connection', 'queue', 'failed_at']);
            // Índice para mejorar búsquedas por conexión, cola y fecha
        });
    }

    /**
     * Revertir las migraciones (eliminar tablas).
     */
    public function down(): void
    {
        // Elimina las tablas si existen (rollback)
        Schema::dropIfExists('jobs');
        Schema::dropIfExists('job_batches');
        Schema::dropIfExists('failed_jobs');
    }
};