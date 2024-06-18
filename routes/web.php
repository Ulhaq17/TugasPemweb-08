<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatatanFinansialController;
use App\Models\CatatanFinansial;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/catatanfinansial', function () {
    return view('catatanfinansial');
});

Route::get('/updatecatatanfinansial', function () {
    return view('updatecatatanfinansial');
});

Route::get('/catatanfinansial', [CatatanFinansialController::class, 'index'])->name('catatanFinansial.index');
Route::post('/catatanfinansial', [CatatanFinansialController::class, 'store'])->name('catatanFinansial.store');
Route::delete('/catatanfinansial/{id}', [CatatanFinansialController::class, 'destroy'])->name('catatanFinansial.destroy');
Route::put('/catatanfinansial/{id}', [CatatanFinansialController::class, 'update'])->name('catatanFinansial.update');