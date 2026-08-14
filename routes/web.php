<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;


Route::get('/run-migrate', function () {
    try {
        Artisan::call('migrate:fresh --force');
        return "Database wiped and migrated successfully! Now your photocard site is ready.";
    } catch (\Exception $e) {
        return "Migration Error: " . $e->getMessage();
    }
});


Route::get('/', function () {
    return view('welcome');
});



Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');