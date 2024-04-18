<?php

use Illuminate\Support\Facades\Route;

Route::get('/create-user', function () {
    return view('createUser');
});
