<?php

use App\Http\Controllers\Api\EmployeeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\EnterpriseController;

Route::controller(EnterpriseController::class)->group(function() {
    Route::post('enterprises', 'save');
    Route::get('enterprises','getAll');
    Route::put('enterprises/{id}','update');
    Route::delete('enterprises/{id}','delete');
});

Route::controller(EmployeeController::class)->group(function()
{
    Route::post('employees', 'save');
    Route::get('employees','getAll');
    Route::put('employees/{id}','update');
    Route::delete('employees/{id}','delete');
    Route::get('employees/{id}','show');
});