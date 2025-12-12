<?php

use Illuminate\Support\Facades\Route;

// Route::get('/{any}', function () {
//     return view('welcome'); // Or your SPA's main view
// })->where('any', '.*');

Route::get('/', function () {
    return view('welcome'); // Or your SPA's main view
});

Route::get('{path}', function () {
    return view('spa'); // Or your SPA's main view
})->where('path', '(.*)');
