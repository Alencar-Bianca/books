<?php

use Illuminate\Support\Facades\Route;
use App\Web\User\Controller\UserController;
use App\Web\Book\Controller\BookController;

Route::namespace('\App\Web\User\Controllers')->group(function () {

    Route::get('/create-user', [UserController::class, 'index'])->name('user.index');
    Route::post('/create-user', [UserController::class, 'store'])->name('user.create');
    Route::get('/show-user', [UserController::class, 'show'])->name('user.show');
    Route::get('/edit-user/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user-editar/{id}', [UserController::class, 'editReq'])->name('user.edit.req');
    Route::post('/delete-user/{id}', [UserController::class, 'delete'])->name('user.delete');
});

Route::namespace('\App\Web\Book\Controllers')->group(function () {

    Route::get('/create-book', [BookController::class, 'index'])->name('book.index');
    Route::post('/create-book', [BookController::class, 'store'])->name('book.create');
    Route::get('/show-book', [BookController::class, 'show'])->name('book.show');
    Route::post('/delete-book/{id}', [BookController::class, 'delete'])->name('book.delete');
});
