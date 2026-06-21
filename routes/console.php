<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
// Importa:
// - Inspiring → clase que contiene frases inspiradoras
// - Artisan → herramienta para crear comandos en Laravel

Artisan::command('inspire', function () {
    // Define un comando personalizado llamado "inspire"

    $this->comment(Inspiring::quote());
    // Muestra en la consola una frase inspiradora
    // Inspiring::quote() devuelve un texto aleatorio
    // $this->comment() lo imprime con formato en consola

})->purpose('Display an inspiring quote');
// Define el propósito del comando (descripción)
// Se muestra cuando usás: php artisan list
