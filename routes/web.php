<?php

use App\Http\Controllers\ContactController;
use App\Mail\ContactMessage;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'skills' => App\Models\Skill::all(),
        'projects' => App\Models\Project::all(),
    ]);
});

Route::post('contact-form', [ContactController::class, 'store'])->name('contact-form.store');

Route::get('/test', function () {
    return new ContactMessage('Sinan Sarıçayır', 'sinan@gmail.com', 'Hello friend!');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});