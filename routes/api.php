<?php

use App\Http\Controllers\Breed\BreedDeleteController;
use App\Http\Controllers\Breed\BreedGetController;
use App\Http\Controllers\Breed\BreedPostController;
use App\Http\Controllers\Breed\BreedPutController;
use App\Http\Controllers\Cat\CatDeleteController;
use App\Http\Controllers\Cat\CatGetController;
use App\Http\Controllers\Cat\CatPostController;
use App\Http\Controllers\Cat\CatPutController;
use Illuminate\Support\Facades\Route;

Route::post('/breed', [BreedPostController::class, '__invoke']);
Route::get('/breed', [BreedGetController::class, '__invoke']);
Route::put('/breed', [BreedPutController::class, '__invoke']);
Route::delete('/breed', [BreedDeleteController::class, '__invoke']);

Route::post('/cat', [CatPostController::class, '__invoke']);
Route::get('/cat', [CatGetController::class, '__invoke']);
Route::put('/cat', [CatPutController::class, '__invoke']);
Route::delete('/cat', [CatDeleteController::class, '__invoke']);