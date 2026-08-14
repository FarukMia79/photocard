<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/run-migrate', function () {
    try {
        Artisan::call('migrate --force');
        return "Database migrated successfully!";
    } catch (\Exception $e) {
        return "Error: " . $e->getMessage();
    }
});


Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');