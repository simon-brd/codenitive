<?php

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

Route::get('/home','ViewController@homeQuizz')->name('allQuizz');

Route::get('/MyQuizz', 'ViewController@activeQuizz')->name('activeQuizz');

Route::get('/archiveQuizz', 'ViewController@archiveQuizz')->name('archiveQuizz');




Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/logout', function () {
    return view('auth.login');
})->name('logout');

