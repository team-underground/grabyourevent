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
Route::get('/terms-of-services', function () {
    return Inertia::render('Terms');
});
Route::get('/privacy-policy', function () {
    return Inertia::render('Privacy');
});
Route::get('/contact-us', function () {
    return Inertia::render('Contact');
});

// public events
Route::get('/events', 'EventsController@index')->name('events.index');
Route::get('/this-month', 'EventsController@index')->name('events.index');
Route::get('/events/{event_slug}', 'EventsController@show')->name('events.show');

Route::middleware(['auth'])->group(function () {
    //dashboard
    Route::get('/dashboard', 'DashboardController')->name('dashboard');
    // admin events
    Route::get('/admin/events', 'Admin\EventsController@index')->name('admin.events.index');
    Route::get('/admin/events/create', 'Admin\EventsController@create')->name('admin.events.create');
    Route::post('/admin/events/create', 'Admin\EventsController@store')->name('admin.events.store');
    Route::get('/admin/events/{event}/edit', 'Admin\EventsController@edit')->name('admin.events.edit');
    Route::post('/admin/events/{event}/update', 'Admin\EventsController@update')->name('admin.events.update');
    Route::post('/admin/events/{uuid}/publish', 'Admin\EventsPublishController@store')->name('admin.events.publish');
    Route::delete('/admin/events/{uuid}/image', 'Admin\EventsController@deleteImage')->name('admin.events.deleteimage');
});
// buy tickets
// Route::get('/events/{event}/buy', 'TicketBuyController@create')->name('tickets.buy.create');
// Route::post('/events/{event}/buy', 'EventTicketController@store')->name('tickets.buy.store');

// Route::post('/add-to-cart/{ticket_category_uuid}', 'CartController@addToCart');
// Route::post('/remove-item-from-cart', 'CartController@removeFromCart');
// Route::get('/checkout', 'CheckoutController@create');
// Route::post('/verify-payment', 'CheckoutController@verifyPayment');

// Route::get('/tickets', function () {
//     return Inertia::render('Tickets');
// });

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
    // return Inertia::render('Auth/Login');
    return Inertia::render('Subscribe');
});

Route::get('/admin/login', function () {
    return Inertia::render('Auth/Login');
})->middleware('guest')->name('login');
Route::post('login')->name('login.attempt')->uses('Auth\LoginController@login')->middleware('guest');
Route::get('/home', function () {
    return redirect('/dashboard');
})->middleware('auth');

Route::post('logout')->name('logout')->uses('Auth\LoginController@logout');


Route::get('/register', function () {
    // return Inertia::render('Auth/Register');
    return Inertia::render('Subscribe');
});

Route::post('/contact/query', 'ContactsController')->name('contacts.query');