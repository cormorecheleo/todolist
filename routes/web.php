<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoListController;
use App\Http\Controllers\UpperCaseController;

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

Route::get('/', [TodoListController::class, 'index'])->name('todolist.index');

Route::get('/todolist/{id}', [TodoListController::class, 'show'])->name('todolist.show');

Route::match(['GET', 'POST'], '/todos/create', ["uses" => "App\Http\Controllers\TodoListController@create"])->name('todolist.create');

Route::get('/upper/{value}', [UpperCaseController::class, 'index'])->name('upper.indedx');

Route::get('/todos/{id}/create', [TodoController::class, 'create'])->name('todos.create');

Route::post('/todos/store', [TodoController::class, 'store'])->name('todos.store');


Route::get('/usesession', [UpperCaseController::class, 'usesession'])->name('upper.usesession');