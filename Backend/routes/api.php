<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\UserTaskController;
use App\Http\Controllers\Api\SkillController;
use App\Http\Controllers\Api\TasksController;
use App\Http\Controllers\Api\StatusController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\RegisterController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);



Route::group(['middleware' => 'auth:sanctum'], function () {


    //Task Controller

    Route::resource('users', UserController::class);
    // Route::resource('tasks', TaskController::class);
    Route::get('logout', [RegisterController::class, 'logout']);



    //New Task Routes
    Route::get('tasks', [TasksController::class, 'index']);
    Route::post('tasks', [TasksController::class, 'store']);
    Route::get('tasks/{id}', [TasksController::class, 'show']);
    Route::put('tasks/{id}', [TasksController::class, 'update']);
    Route::delete('tasks/{id}', [TasksController::class, 'destroy']);



    //Status Routes
    Route::post('status', [StatusController::class, 'store']);
    Route::get('status', [StatusController::class, 'index']);
    Route::get('status/{id}', [StatusController::class, 'show']);
    Route::put('status/{id}', [StatusController::class, 'update']);
    Route::delete('status/{id}', [StatusController::class, 'destroy']);


    //UserTasks Routes

    Route::post('user/tasks', [UserTaskController::class, 'store']);
    Route::get('user/tasks', [UserTaskController::class, 'index']);
    Route::get('user/tasks/{id}', [UserTaskController::class, 'show']);
    Route::put('user/tasks/{id}', [UserTaskController::class, 'update']);
    Route::delete('user/tasks/{id}', [UserTaskController::class, 'destroy']);


    //Skills Routes
    Route::group(['prefix' => 'v1'], function () {
        Route::apiResource('skills', SkillController::class);
    });
});
