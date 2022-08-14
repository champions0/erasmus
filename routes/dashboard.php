<?php

use App\Http\Controllers\Dashboard\PartnerController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'dashboard.index')->name('index');

Route::resource('partners', PartnerController::class)->except('show');
