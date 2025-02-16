<?php

use App\Http\Controllers\ChartController;
use App\Http\Controllers\ProfileController;
use App\Models\Chart;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $charts = Chart::all();
    return view('dashboard', ['charts'=>$charts]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/charts', function () {
    return view('charts.index');
})->middleware(['auth', 'verified'])->name('charts');

Route::resource('charts', ChartController::class)->middleware(['auth', 'verified']);