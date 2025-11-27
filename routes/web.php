<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TravelNoteController;

Route::get('/', [TravelNoteController::class, 'ShowLogin'])->name('config.show');
Route::post('/', [TravelNoteController::class, 'login']);

Route::get('/travel', [TravelNoteController::class, 'index'])->name('travel.index');
Route::get('/travel/create', [TravelNoteController::class, 'create'])->name('travel.create');
Route::post('/travel', [TravelNoteController::class, 'store'])->name('travel.store');
Route::get('/travel/{id}/edit', [TravelNoteController::class, 'edit'])->name('travel.edit');
Route::post('/travel/{id}/update', [TravelNoteController::class, 'update'])->name('travel.update');
Route::post('/travel/{id}/delete', [TravelNoteController::class, 'destroy'])->name('travel.destroy');


