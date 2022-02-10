<?php

use App\Http\Controllers\Breed\BreedDeleteController;
use App\Http\Controllers\Breed\BreedGetController;
use App\Http\Controllers\Breed\BreedPostController;
use App\Http\Controllers\Breed\BreedPutController;
use Illuminate\Support\Facades\Route;

Route::post('/breed', BreedPostController::class.'@__invoke');
Route::get('/breed', BreedGetController::class.'@__invoke');
Route::put('/breed/{id}', BreedPutController::class.'@__invoke');
Route::delete('/breed/{id}', BreedDeleteController::class.'@__invoke');