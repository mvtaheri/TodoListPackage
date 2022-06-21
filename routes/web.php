<?php

use Illuminate\Support\Facades\Route;
use Taheri\Todolist\Http\Controllers\TaskController;
use Taheri\Todolist\Http\Controllers\LabelController;

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::get('create-task',[TaskController::class,'create'])->name('task.create');
Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');
Route::get('task-delete/{task}',[TaskController::class,'delete'])->name('task.delete');
Route::post('/task', [TaskController::class, 'store'])->name('tasks.store');
Route::post('/label',[LabelController::class,'add_label_to_task'])->name('label.create');
Route::post('/search',[LabelController::class,'search'])->name('label.search');