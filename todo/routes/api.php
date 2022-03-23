<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\TodosController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/index', [TodosController::class, 'index']);
Route::post('/add', [TodosController::class, 'store']);
Route::post('/remove', [TodosController::class, 'remove']);
Route::post('/removeall', [TodosController::class, 'removeall']);
Route::post('/doneall', [TodosController::class, 'doneall']);
// Route::resource('todos', TodosController::class);
