<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/run-migrate', function () {
    try {
        DB::statement('DROP SCHEMA public CASCADE;');
        DB::statement('CREATE SCHEMA public;');

        Artisan::call('migrate', ['--force' => true]);

        return nl2br(
            "Migration Output:\n\n" .
            Artisan::output()
        );

    } catch (\Throwable $e) {
        return nl2br(
            "Migration Error:\n\n" .
            $e->getMessage() .
            "\n\nFile: " .
            $e->getFile() .
            "\nLine: " .
            $e->getLine() .
            "\n\nTrace:\n" .
            $e->getTraceAsString()
        );
    }
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('{any}', function () {
    return view('welcome');
})->where('any', '.*');