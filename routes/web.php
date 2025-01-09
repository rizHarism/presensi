<?php

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

Route::get('/profile', function () {
    return view('admin-panel.profile.index');
})->middleware(['auth', 'verified'])->name('profile');

Route::get('/presensi', function () {
    return view('admin-panel.presensi.index');
})->middleware(['auth', 'verified'])->name('presensi');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
