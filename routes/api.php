<?php

use App\Http\Controllers\Api\Auth\AuthControllerApi;
use App\Http\Controllers\Api\SupportControllerApi;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthControllerApi::class, 'auth']);
Route::post('/logout', [AuthControllerApi::class, 'logout'])->middleware(['auth:sanctum']);
Route::get('/me', [AuthControllerApi::class, 'me'])->middleware(['auth:sanctum']);
Route::middleware(['auth:sanctum'])->group(function () {
    // Route::apiResource('/supports', SupportControllerApi::class);
    Route::get('/supports', [SupportControllerApi::class, 'index']);
    Route::post('/supports/store', [SupportControllerApi::class, 'store'])->name('supports.store');
    Route::put('/supports/{id}', [SupportControllerApi::class, 'update'])->name('supports.update');
    Route::delete('/supports/{id}', [SupportControllerApi::class, 'destroy'])->name('supports.destroy');

});
