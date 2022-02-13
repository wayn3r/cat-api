<?php

use Illuminate\Http\JsonResponse;
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

Route::get('/', function () {
    return new JsonResponse(
        [
            'routes' => [
                'breed' => [
                    'Create' => 'POST /api/breed',
                    'List all' => 'GET /api/breed',
                    'Search by name' => 'GET /api/breed?q=test',
                    'Delete' => 'DELETE /api/breed',
                ],
                'cat' => [
                    'Create' => 'POST /api/cat',
                    'List all' => 'GET /api/cat',
                    'Search by id' => 'GET /api/cat?id=1',
                    'Update' => 'PUT /api/cat',
                    'Delete' => 'DELETE /api/cat',
                ],
            ]
        ]
    );
});
