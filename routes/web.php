<?php

use App\Http\Controllers\AdminForecastsController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ForecastController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminCheck;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

Route::get('/', [HomePageController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', AdminCheck::class])->prefix('admin')->group(function () {
    Route::get("/city", [CityController::class, 'addCity']);
    Route::post('/add-city', [CityController::class, 'saveCity'])->name('city.add');
    Route::get('/city/{city}', [CityController::class, 'editCity'])->name('city.single');
    Route::get('/forecast', [ForecastController::class, 'addForecast']);
    Route::post("/add-forecast", [ForecastController::class, "saveForecast"])->name('forecast.add');
    Route::get('/city/{city}/delete', [CityController::class, 'delete'])->name('city.delete');
});

Route::get('/forecast/{city:name}', [ForecastController::class, 'citiesForecast'])->name('forecast.cities');

//Domaci 14

Route::view('/admin/forecasts', 'admin.forecasts');
Route::post('/admin/forecasts/add', [AdminForecastsController::class, 'addForecast'])
    ->name('forecast.add');

//_____________
