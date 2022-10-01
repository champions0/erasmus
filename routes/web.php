<?php

use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MaterialController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group([
    'prefix' => \Mcamara\LaravelLocalization\Facades\LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect']
], function () {

        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::get('/about', [HomeController::class, 'about'])->name('about');
        Route::get('/partners', [HomeController::class, 'partners'])->name('partners');
        Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
        Route::get('/materials', [MaterialController::class, 'index'])->name('materials');
        Route::get('/materials/{material}', [MaterialController::class, 'show'])->name('materials.show');
        Route::get('/activities', [ActivityController::class, 'index'])->name('activities');
        Route::get('/activity/{activity:slug}', [ActivityController::class, 'show'])->name('activity.show');
    }
);


Auth::routes(['register' => false]);

