<?php

use Illuminate\Support\Facades\Route;
use App\Web\User\Controller\UserController;
use App\Web\Book\Controller\BookController;

Route::namespace('\App\Web\User\Controllers')->group(function () {

    Route::get('/create-user', [UserController::class, 'index'])->name('user.index');
    Route::post('/create-user', [UserController::class, 'store'])->name('user.create');
    Route::get('/show-user', [UserController::class, 'show'])->name('user.show')->middleware('auth');
    Route::get('/edit-user/{id}', [UserController::class, 'edit'])->name('user.edit')->middleware('auth');
    Route::post('/login', [UserController::class, 'signIn'])->name('user.login');
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/user-editar/{id}', [UserController::class, 'editReq'])->name('user.edit.req')->middleware('auth');
    Route::post('/delete-user/{id}', [UserController::class, 'delete'])->name('user.delete')->middleware('auth');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');
    Route::post('/add-book/{id}/{user_id}', [UserController::class, 'addIdBook'])->name('add.id.book')->middleware('auth');
});

Route::namespace('\App\Web\Book\Controllers')->group(function () {

    Route::get('/create-book', [BookController::class, 'index'])->name('book.index')->middleware('auth');
    Route::post('/create-book', [BookController::class, 'store'])->name('book.create')->middleware('auth');
    Route::get('/show-book', [BookController::class, 'show'])->name('book.show')->middleware('auth');
    Route::get('/edit-book/{id}', [BookController::class, 'edit'])->name('book.edit')->middleware('auth');
    Route::post('/book-editar/{id}', [BookController::class, 'editReq'])->name('book.edit.req')->middleware('auth');
    Route::post('/delete-book/{id}', [BookController::class, 'delete'])->name('book.delete')->middleware('auth');
});
