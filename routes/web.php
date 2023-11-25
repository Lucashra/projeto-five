<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\fileController;


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

Route::get('/', function () {
    return view('auth/login');
});


// JETSTREAM
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',
])->group(function () {
    Route::get('/file-upload', [fileController::class, 'index'])->name('file-upload');
    Route::get('/file-upload', [fileController::class, 'create'])->name('file-upload');
    Route::post('/file-upload',[fileController::class, 'store'])->name('file-post');
});
