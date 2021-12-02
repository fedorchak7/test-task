<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    Route::get('contacts', [\App\Http\Controllers\ContactController::class, 'index'])->name('contacts.index');
    Route::get('contact/add', [\App\Http\Controllers\ContactController::class, 'add'])->name('contact.add');
    Route::post('contact/add', [\App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');
    Route::get('contact/{id}', [\App\Http\Controllers\ContactController::class, 'show'])->name('contact.show');
    Route::get('contact/{id}/edit', [\App\Http\Controllers\ContactController::class, 'edit'])->name('contact.edit');
    Route::post('contact/{id}/edit', [\App\Http\Controllers\ContactController::class, 'update'])->name('contact.update');

    Route::get('templates', [\App\Http\Controllers\TemplateController::class, 'index'])->name('templates.index');
    Route::get('template/add', [\App\Http\Controllers\TemplateController::class, 'add'])->name('template.add');
    Route::post('template/add', [\App\Http\Controllers\TemplateController::class, 'store'])->name('template.store');
    Route::get('template/{id}', [\App\Http\Controllers\TemplateController::class, 'show'])->name('template.show');
    Route::get('template/{id}/edit', [\App\Http\Controllers\TemplateController::class, 'edit'])->name('template.edit');
    Route::post('template/{id}/edit', [\App\Http\Controllers\TemplateController::class, 'update'])->name('template.update');

    Route::get('mails/send', [\App\Http\Controllers\MailController::class, 'index'])->name('mails');
    Route::post('mails/send', [\App\Http\Controllers\MailController::class, 'send'])->name('mails.send');
});
