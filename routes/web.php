<?php

use App\Livewire\PostIndex;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\VerifyReceiptController;
use App\Http\Controllers\DownloadReceiptController;
use App\Http\Controllers\IndustrySolutionsController;

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

Route::get('/healthcare', function () {
    return view('healthcare_solutions');
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

Route::get('/', [WelcomeController::class, 'profile'])->name('welcome');

Route::get('/download-qrcode', [WelcomeController::class, 'downloadQrCode'])->name('downloadQrCode');

// Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::post('/store-duration', [PostController::class, 'update'])->name('update');
Route::get('/post/{slug}', [PostController::class, 'show'])->name('post.show');

Route::get('/posts', PostIndex::class)->name('posts');

Route::get('/verify-receipt/{id}', [VerifyReceiptController::class, 'verifyReceipt'])
    ->name('verify.receipt')
    ->middleware('web');  // Explicitly add web middleware only

Route::get('/download-receipt/{transaction_id}', [DownloadReceiptController::class, 'downloadReceipt'])->name('download.receipt');
Route::get('/download-receipt-png/{receipt_id}', [DownloadReceiptController::class, 'downloadReceiptPng'])->name('download.receipt.png');

Route::get('/healthcare-solutions', App\Livewire\HealthcareSolutions::class)->name('healthcare.soultions');

Route::get('/industry-solutions/{industry}', [IndustrySolutionsController::class, 'show'])
    ->name('industry.show');