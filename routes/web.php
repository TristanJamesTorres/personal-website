<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Every route below points to a PageController method. The controller
| gathers whatever data a page needs and hands it to a Blade view —
| no HTML lives in the routes or controller themselves.
|
*/

Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/about', [PageController::class, 'about'])->name('about');

Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');
Route::get('/gallery/{slug}', [PageController::class, 'galleryShow'])->name('gallery.show');

Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'sendContact'])->name('contact.send');
