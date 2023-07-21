<?php

use App\Http\Livewire\PostIndex;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/landing', function () {
    return view('landingpage');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/', [WelcomeController::class, 'profile'])->name('profile');

// Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::post('/store-duration', [PostController::class, 'update'])->name('update');
Route::get('/post/{slug}', [PostController::class, 'show'])->name('post.show');

Route::get('/posts', PostIndex::class)->name('posts');


