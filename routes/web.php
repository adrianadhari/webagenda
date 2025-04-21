<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AgendaController;
use App\Models\Agenda;

Route::post('/agenda', [AgendaController::class, 'store'])->name('agenda.store');
Route::get('/agenda/create', [AgendaController::class, 'create'])->name('agenda.create');
Route::get('/agenda/{status}', [AgendaController::class, 'showByStatus'])->name('agenda.status');
Route::get('/api/agendas/{date}', [AgendaController::class, 'getAgendasByDate'])->name('agenda.byDate');
Route::get('/api/agenda-dates', [AgendaController::class, 'getAgendaDatesForMonth'])->name('agenda.dates');

Route::delete('/agenda/{id}', [AgendaController::class, 'destroy'])->name('agenda.destroy');
Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda.index');

Route::get('add-to-log', 'HomeController@myTestAddToLog');

Route::get('logActivity', 'HomeController@logActivity');

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('login.post');

Route::get('/dashboard', [AgendaController::class, 'dashboard'])->name('dashboard');

Route::middleware(['auth'])->group(function () {

    Route::get('/new', [HomeController::class, 'index'])->name('dashboard');

    Route::get('/agenda', [HomeController::class, 'index'])->name('agenda');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// });
Route::get('/new', function () {
    return view('new');
});
Route::get('/draft', function () {
    return view('draft');
});

Route::get('/tentative', function () {
    return view('tentative');
});

Route::get('/confirm', function () {
    return view('confirm');
});

Route::get('/cancel', function () {
    return view('cancel');
});

Route::get('/user', [UserController::class, 'index'])->name('user');
Route::post('/user', [UserController::class, 'store'])->name('storeUser');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
Route::get('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');

Route::get('/laporan', function () {
    return view('laporan');
});
Route::get('/editprofile', function () {
    return view('editprofile');
});
Route::get('/agenda', function () {
    return view('agenda');
});
Route::get('/draft', [AgendaController::class, 'draft']);
Route::get('/tentative', [AgendaController::class, 'tentative']);
Route::get('/confirm', [AgendaController::class, 'confirm']);
Route::get('/cancel', [AgendaController::class, 'cancel']);
Route::get('/print', [AgendaController::class, 'print']);

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');
