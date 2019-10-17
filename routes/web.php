<?php

use Inertia\Inertia;
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

Route::get('/', function () {
    return Inertia::render('Welcome');
});
Route::get('/about', function () {
    return Inertia::render('About');
});
Route::get('/contact', function () {
    return Inertia::render('Contact');
});

Route::get('/tickets', function () {
    return Inertia::render('Tickets');
});


Route::get('/single', function () {
    return Inertia::render('Single');
});

Route::get('/settings', function () {
    return Inertia::render('Settings');
});

Route::get('/notifications', function () {
    return Inertia::render('Notifications');
});

Route::get('/faq', function () {
    return Inertia::render('Faq');
});


Route::get('/login', function () {
    return Inertia::render('Auth/Login');
});

Route::get('/register', function () {
    return Inertia::render('Auth/Register');
});
//events
Route::get('/events', 'EventsController@index');
Route::post('/events/create', 'EventsController@store');
Route::get('/events/{event}/edit', 'EventsController@edit')->name('events.edit');

//tickets
Route::post('/events/{event}/buy', 'EventTicketController@store')->name('tickets.buy');
