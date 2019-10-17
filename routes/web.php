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

//events
Route::get('/events', 'EventsController@index');
Route::post('/events/create', 'EventsController@store');
Route::get('/events/{event}/edit', 'EventsController@edit')->name('events.edit');
Route::get('/events/{event_slug}', 'EventsController@show')->name('events.show');

//tickets
Route::post('/events/{event}/buy', 'EventTicketController@store')->name('tickets.buy');
