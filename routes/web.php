<?php

use App\Http\Controllers\AdminForecastsController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ForecastController;
use App\Http\Controllers\ForecastsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserCitiesController;
use App\Http\Middleware\AdminCheck;
use App\Models\UserCities;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

Route::get('/', function () {
    $user = Auth::user();
    $userFavourites = [];

    if ($user !== null) {
        $userFavourites = UserCities::where(
            [
                'user_id' => $user->id
            ]
        )->get();
    }
    return view('welcome', compact('userFavourites'));
});

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
    Route::get('/city/edit/{city}', [CityController::class, 'editCity'])->name('city.single');
    Route::get('/forecast', [ForecastController::class, 'addForecast']);
    Route::get('/city/delete/{city}', [CityController::class, 'delete'])->name('city.delete');

    Route::post("/add-forecast", [ForecastController::class, "saveForecast"])->name('forecast.add');
    Route::post('/add-city', [CityController::class, 'saveCity'])->name('city.add');
});
//search city forecast
Route::get('/forecast/search', [ForecastsController::class, 'search'])->name('forecast.search');
Route::get('/forecast/{city:name}', [ForecastsController::class, 'citiesForecast'])->name('forecast.cities');

//Domaci 14
Route::view('/admin/forecasts', 'admin.forecasts');
Route::post('/admin/forecasts/add', [AdminForecastsController::class, 'addForecast'])->name('forecast.add');
//_____________

//user cities
Route::get('/user-cities/favourite/{city}', [UserCitiesController::class, 'favourite'])
    ->name('city.favourite');
Route::get('/user-cities/unfavorite/{city}', [UserCitiesController::class, 'unFavorite'])
    ->name('city.unfavorite');
