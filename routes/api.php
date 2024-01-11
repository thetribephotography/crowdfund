<?php

use App\Http\Controllers\DonationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/dashboard', [DonationController::class, 'view_all_donations'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/one/donation/{id}', [DonationController::class, 'view_one_donation'])->name('one.donation');
Route::get('/create/donation', [DonationController::class, 'create_donation'])->name('create.donation');
Route::post('/setup/donation', [DonationController::class, 'setup_donation'])->name('setup.donation');



require __DIR__ . '/auth.php';

