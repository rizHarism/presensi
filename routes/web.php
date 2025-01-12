<?php

use App\Http\Controllers\Presensi\PresensiController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    if (Auth::user()) {
        if (Auth::user()->role == "admin") {
            return view('admin-panel.dashboard.index');
        } else {
            return redirect()->route('profile');
        }
    }
    return view('auth.login');
})->name('dashboard');

Route::middleware('auth', 'verified')->group(function () {
    // Route for presensi
    Route::get('/presensi', [PresensiController::class, 'index'])->name('presensi');
    Route::get('/presensi/history', [PresensiController::class, 'history'])->name('presensi.history');
    Route::get('/presensi/history/dt', [PresensiController::class, 'datatables'])->name('presensi.datatables');
    Route::post('/presensi/store', [PresensiController::class, 'store'])->name('presensi.store');

    // Route for profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    // Route::get('/profile', function () {
    //     return view('admin-panel.profile.index');
    // })->name('profile');
});


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
