<?php

use App\Http\Controllers\ForumController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [ForumController::class, 'index'])->name('index');
Route::get('/category/{slug}', [ForumController::class, 'getPostsByCategory'])->name('getPostsByCategory');
Route::get('/category/{slug_category}/{slug_post}', [ForumController::class, 'getPost'])->name('getPost');

Route::name('user.')->group(function() {
    Route::get('/private/asked', [ForumController::class, 'getPostsByAuthUser'])->middleware('auth')->name('private');
    Route::get('/private', function() {
        return redirect(route('user.private'));
    });

    Route::get('/login', function() {
        if (Auth::check()) {
            return redirect(route('user.private'));
        }
        return view('pages.login');
    })->name('login');

    Route::post('/login', [\App\Http\Controllers\LoginController::class, 'login']);

    Route::get('/logout', function() {
        Auth::logout();
        return redirect('/');
    })->name('logout');

    Route::get('/registration', function() {
        if (Auth::check()) {
            return redirect(route('user.private'));
        }
        return view('pages.registration');
    })->name('registration');

    Route::post('/registration', [\App\Http\Controllers\RegisterController::class, 'save']);
});

Route::get('/ask-question', function() {
    if (!Auth::check()) {
        return redirect(route('index'));
    }
    return view('pages.ask-question');
})->name('askQuestion');

Route::post('/ask-question', [\App\Http\Controllers\AskQuestionController::class, 'askQuestion']);


