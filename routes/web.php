<?php

use App\Http\Controllers\DonationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/dashboard', [DonationController::class, 'view_all_donations'])->middleware(['auth', 'verified'])->name('dashboard');
// Route::get('/one/donation/{id}', [DonationController::class, 'view_one_donation'])->name('one.donation');
// Route::get('/create/donation', [DonationController::class, 'create_donation'])->name('create.donation');
// Route::post('/setup/donation', [DonationController::class, 'setup_donation'])->name('setup.donation');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
