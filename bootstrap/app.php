<?php
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Console\Commands\ChequeoDiario; // Asegúrate de importar la clase ChequeoDiario
use App\Console\Commands\GenerarAvisos; // Asegúrate de importar la clase GenerarAvisos
use App\Http\Middleware\CheckDeletePermission; // Asegúrate de importar la clase CheckDeletePermission


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        
       $middleware->alias([
        'Is_admin' => CheckDeletePermission::class
    ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->withCommands([
        ChequeoDiario::class, // Agregado por mi *****Agrega el comando ChequeoDiario aquí
        // Agrega otros comandos aquí si es necesario
    ])
    ->withCommands([
        GenerarAvisos::class, // Agregado por mi *****Agrega el comando GenerarAvisos aquí
        // Agrega otros comandos aquí si es necesario
    ])
    
    ->create();
