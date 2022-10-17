<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CharacterController;

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
    return view('welcome');
});

// Index
Route::get('/characters', [CharacterController::class, 'index']);

// Create
Route::get('/characters/create', [CharacterController::class, 'create']);

// Store
Route::post('/characters', [CharacterController::class, 'store'])->name('character.store');

// Show
Route::get('/characters/{id}', [CharacterController::class, 'show']);

// Edit
Route::get('/characters/{id}/edit', [CharacterController::class, 'edit'])->name('character.edit');

// Update
Route::patch('/characters/{id}', [CharacterController::class, 'update'])->name('character.update');

// Destroy
Route::delete('/characters{id}', [CharacterController::class, 'destroy'])->name('character.destroy');
