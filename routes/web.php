<?php

use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminCheck;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

Route::get('/',[HomePageController::class,'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', AdminCheck::class])->prefix('admin')->group(function () {
    Route::get("/city",[\App\Http\Controllers\CityController::class,'addCity']);
    Route::post('/add-city',[\App\Http\Controllers\CityController::class,'saveCity'])->name('city.add');
    Route::get('/forecast',[\App\Http\Controllers\ForecastController::class,'addForecast']);
    Route::post("/add-forecast",[\App\Http\Controllers\ForecastController::class,"saveForecast"])->name('forecast.add');
});

