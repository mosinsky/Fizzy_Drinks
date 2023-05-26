<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DrinkController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// REQUEST HTTP -> z przeglądarki -> index.php -> api.php --- [ Middleware ] ---> ?Controller.php

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [\App\Http\Controllers\Api\Auth\UserController::class, 'login']);

// Auth:sanctum sprawdza czy na requeście HTTP istnieje Authorization: Bearer API_TOKEN
Route::middleware('auth:sanctum')->prefix('drinks')->group(function () {
    Route::get('/', [DrinkController::class, 'all'])->name('drink.all');
    Route::get('/{drink}', [DrinkController::class, 'find'])->name('drink.find');
    Route::post('/', [DrinkController::class, 'create'])->name('drink.create');
    Route::put('/{drink}', [DrinkController::class, 'update'])->name('drink.update');
    Route::delete('/{drink}', [DrinkController::class, 'delete'])->name('drink.delete');
});

