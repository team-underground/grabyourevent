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

Route::get('/', 'WelcomeController');

Route::get('/about', function () {
    return Inertia::render('About');
});
Route::get('/contact', function () {
    return Inertia::render('Contact');
});

// public events
Route::get('/events', 'EventsController@index')->name('events.index');
Route::get('/this-month', 'EventsController@index')->name('events.index');
Route::get('/events/{event_slug}', 'EventsController@show')->name('events.show');

// admin events
Route::get('/admin/events', 'Admin\EventsController@index')->name('admin.events.index');
Route::get('/admin/events/create', 'Admin\EventsController@create')->name('admin.events.create');
Route::post('/admin/events/create', 'Admin\EventsController@store')->name('admin.events.store');
Route::get('/admin/events/{event}/edit', 'EventsController@edit')->name('admin.events.edit');

Route::get('/dashboard', 'DashboardController')->name('dashboard');

// buy tickets
// Route::get('/events/{event}/buy', 'TicketBuyController@create')->name('tickets.buy.create');
// Route::post('/events/{event}/buy', 'EventTicketController@store')->name('tickets.buy.store');

// Route::post('/add-to-cart/{ticket_category_uuid}', 'CartController@addToCart');
// Route::post('/remove-item-from-cart', 'CartController@removeFromCart');
// Route::get('/checkout', 'CheckoutController@create');
// Route::post('/verify-payment', 'CheckoutController@verifyPayment');

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
