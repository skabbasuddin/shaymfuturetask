<?php

use App\Http\Controllers\Task\TaskController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
//route for listing user
Route::get("/",[TaskController::class,"index"])->name("index");
//route for create new user
Route::post('users/store', [TaskController::class, 'store'])->name('users.store');
//route for delete the user
Route::delete('/users/{index}/destroy', [TaskController::class, 'destroy'])->name('users.destroy');
//route for update user
Route::put('/users/{index}/update', [TaskController::class, 'update'])->name('users.update');
