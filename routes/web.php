<?php

use App\Jobs\SignUpJob;
use App\Models\User;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     // return view('welcome');
//     // checkHelperFunc();
//     // return \App\Models\User::has('roles')->get();
//     // return \App\Models\User::with('roles')->get();
//     $user = User::find(1);
//     dispatch(new SignUpJob($user));
// });

Route::get('/{any}', function () {
    return view('welcome'); // Or your SPA's main view
})->where('any', '.*');
