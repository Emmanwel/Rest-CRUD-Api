<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskViewController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::controller(TaskViewController::class)->prefix('tasks')->group(function () {
    Route::get('/list', 'index')->name('api.tasks.index');
});


Route::get('/tasks', function () {
    return view('welcome');
});
