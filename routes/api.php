<?php

use App\Http\Controllers\APIs\AuthController;
use App\Http\Controllers\APIs\BranchOfficeController;
use App\Http\Controllers\APIs\ClientController;
use App\Http\Controllers\APIs\FeeTypeController;
use App\Http\Controllers\APIs\GeneralController;
use App\Http\Controllers\APIs\JVController;
use App\Http\Controllers\APIs\RetTrkController;
use App\Http\Controllers\APIs\RTOController;
use App\Http\Controllers\APIs\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::controller(UserController::class)->group(function () {
    Route::post('signup', 'SignUp');
});

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
});

Route::middleware('auth:sanctum')->group(function () {

    Route::controller(UserController::class)->group(function () {
        Route::post('add-user', 'addUser');
    });

    Route::controller(ClientController::class)->group(function () {
        Route::get('list-business-status', 'listBusinessStatus');
        Route::get('list-cities', 'listCities');
        Route::post('add-client-step1', 'addClientStep1');
        Route::put('update-client-profile', 'updateClientProfile');
        Route::get('list-clients', 'listClients');
        Route::get('list-client-profile/{id}', 'listClientProfile');
        Route::get('list-branch-office', 'listBranchOffice');
        Route::post('add-client-fee-types', 'addClientFeeTypes');
        Route::put('update-client-status', 'UpdateClientStatus');
    });

    Route::controller(RTOController::class)->group(function () {
        Route::get('list-rtos', 'listRTOs');
    });

    Route::controller(BranchOfficeController::class)->group(function () {
        Route::get('list-branch-office', 'listBranchOffice');
    });

    Route::controller(GeneralController::class)->group(function () {
        Route::get('list-fee-applied', 'listFeeApplied');
        Route::get('list-classification', 'listClassification');
        Route::get('list-link-accounts', 'listLinkAccounts');

    });

    Route::controller(FeeTypeController::class)->group(function () {
        Route::get('list-fee-types', 'listFeeTypes');
        Route::get('list-fee-type-by-client/{id}', 'listFeeTypesByClient');
        Route::get('list-fee-amt-by-fee-type/{id}/{ft_id}', 'listFeeAmtByFeeType');

    });

    Route::controller(RetTrkController::class)->group(function () {
        Route::post('save-return-tracker', 'saveReturnTracker');
        Route::get('list-return-trackers/{id?}', 'listReturnTrackers');
    });

    Route::controller(JVController::class)->group(function () {
        Route::post('add-jv', 'addJV');
    });

});
// Route::post('save-return-tracker', [RetTrkController::class, 'saveReturnTracker']);

// Route::get('branch', [GeneralController::class, 'listLinkAccounts']);

// Route::get('list-client-profile/{id}', [ClientController::class, 'listClientProfile']);
// Route::put('update-client-profile/{id}', [ClientController::class, 'updateClientProfile']);
// Route::put('/', '');
