<?php

use Illuminate\Database\Migrations\Migration; // Clase base para migraciones
use Illuminate\Database\Schema\Blueprint; // Permite definir las columnas de tablas
use Illuminate\Support\Facades\Schema; // Facade para manipular la base de datos (crear, modificar tablas)

return new class extends Migration
{
    /**
     * Ejecutar las migraciones (crear tablas).
     */
    public function up(): void
    {
        // Crear la tabla 'users' (usuarios del sistema)
        Schema::create('users', function (Blueprint $table) {
            $table->id(); 
            // Columna ID autoincremental (primary key)

            $table->string('name'); 
            // Nombre del usuario

            $table->string('email')->unique(); 
            // Email único (no se puede repetir)

            $table->timestamp('email_verified_at')->nullable(); 
            // Fecha de verificación del email (puede ser null si no está verificado)

            $table->string('password'); 
            // Contraseña del usuario (almacenada encriptada)

            $table->rememberToken(); 
            // Token para funcionalidad "recordarme" (keep session)

            $table->timestamps(); 
            // Crea automáticamente:
            // created_at y updated_at
        });

        // Crear la tabla 'password_reset_tokens'
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary(); 
            // Email como clave primaria (identifica al usuario)

            $table->string('token'); 
            // Token único para restablecer la contraseña

            $table->timestamp('created_at')->nullable(); 
            // Fecha de creación del token
        });

        // Crear la tabla 'sessions' (manejo de sesiones en base de datos)
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary(); 
            // ID de la sesión (clave primaria)

            $table->foreignId('user_id')->nullable()->index(); 
            // ID del usuario (puede ser null si no está logueado)
            // index mejora el rendimiento de consultas

            $table->string('ip_address', 45)->nullable(); 
            // Dirección IP del usuario

            $table->text('user_agent')->nullable(); 
            // Información del navegador/dispositivo del usuario

            $table->longText('payload'); 
            // Datos de la sesión (información serializada)

            $table->integer('last_activity')->index(); 
            // Timestamp de la última actividad
            // index para búsquedas rápidas
        });
    }

    /**
     * Revertir las migraciones (eliminar tablas).
     */
    public function down(): void
    {
        // Elimina las tablas si existen (útil para rollback)
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};