<?php

use App\Http\Controllers\Dashboard\ActivityController;
use App\Http\Controllers\Dashboard\PartnerController;
use App\Http\Controllers\Dashboard\MaterialController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'dashboard.index')->name('index');

Route::resource('partners', PartnerController::class)->except('show');
Route::resource('materials', MaterialController::class)->except('show');
Route::resource('activities', ActivityController::class)->except('show');
