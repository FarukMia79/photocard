<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/run-migrate', function () {
    try {
        DB::statement('DROP SCHEMA public CASCADE;');
        DB::statement('CREATE SCHEMA public;');

        Artisan::call('migrate', ['--force' => true]);

        return "Database wiped and migrated successfully! Now your photocard site is ready.";
    } catch (\Exception $e) {
        return "Migration Error: " . $e->getMessage();
    }
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('{any}', function () {
    return view('welcome');
})->where('any', '.*');