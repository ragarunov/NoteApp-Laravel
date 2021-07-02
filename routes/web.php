<?php

use App\Models\Note;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\NoteLikeController;

Route::get('/notes', [NoteController::class, 'index'])->name('notes');

// Route::get('/notes/{note}', [NoteController::class, 'get']);
Route::get('/notes/{note}', function(Note $note) {
    return view('notes.view', [
        'note' => $note,
    ]);
});


Route::post('/notes', [NoteController::class, 'store']);
Route::delete('/notes/{note}', [NoteController::class, 'destroy'])->name('notes.destroy');

Route::post('/notes/{note}/likes', [NoteLikeController::class, 'store'])->name('notes.likes');
Route::delete('/notes/{note}/likes', [NoteLikeController::class, 'destroy'])->name('notes.likes');

Route::get('/', [NoteController::class, 'index'])->name('home');
