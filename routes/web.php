<?php

use App\Http\Controllers\Administrator\UserController;
use App\Http\Controllers\Administrator\UserPermitController;
use App\Http\Controllers\Administrator\UserPresensisController;
use App\Http\Controllers\Presensi\PermitController;
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
    Route::put('/presensi/update', [PresensiController::class, 'update'])->name('presensi.update');

    // Route for user permit
    Route::get('/permit', [PermitController::class, 'index'])->name('permit.index');
    Route::get('/permit/dt', [PermitController::class, 'datatables'])->name('permit.datatables');
    Route::post('/permit/store', [PermitController::class, 'store'])->name('permit.store');

    // Route for profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

    // Route for administrator role for users
    Route::get('/administrator/users', [UserController::class, 'index'])->name('administrator.users.index');
    Route::get('/administrator/users/datatables', [UserController::class, 'datatables'])->name('administrator.users.datatables');
    Route::post('administrator/users/store', [UserController::class, 'store'])->name('administrator.users.store');

    // Route for administrator role presensies
    Route::get('/administrator/presensis', [UserPresensisController::class, 'index'])->name('administrator.presensis.index');
    Route::get('/administrator/presensis/datatables', [UserPresensisController::class, 'datatables'])->name('administrator.presensis.datatables');
    Route::post('administrator/presensis/store', [UserPresensisController::class, 'store'])->name('administrator.presensis.store');

    // Route for administrator role permit
    Route::get('/administrator/permits', [UserPermitController::class, 'index'])->name('administrator.permits.index');
    Route::get('/administrator/permits/datatables', [UserPermitController::class, 'datatables'])->name('administrator.permits.datatables');
    Route::post('administrator/permits/store', [UserPermitController::class, 'store'])->name('administrator.permits.store');
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
