<?php


use App\Http\Controllers\Frontend\Home\HomepageController;

Route::get('/', [HomepageController::class, 'dash_home'])->name('home');


