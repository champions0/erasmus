<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'dashboard.index')->name('index');

Route::resource('partners', PartnerController::class)->except('show');
Route::resource('materials', MaterialController::class)->except('show');
Route::resource('activities', ActivityController::class)->except('show');
