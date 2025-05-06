<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TemperatureController;





Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
    return view('dashboard', compact('customers'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('clients', ClientController::class);   
    Route::resource('customers', CustomerController::class);

    // method   //route                            //function        //name of the data insert or update in view is product
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');    
    Route::put('/product/{product}/update', [ProductController::class, 'update'])->name('product.update');    
    Route::delete('/product/{product}/destroy', [ProductController::class, 'destroy'])->name('product.destroy'); 

    
    Route::get('/temperatures/export-pdf', [TemperatureController::class, 'exportPdf'])->name('temperatures.export-pdf');

    Route::get('/temperatures', [TemperatureController::class, 'index'])->name('temperatures.index');
    Route::get('/temperatures/create', [TemperatureController::class, 'create'])->name('temperatures.create');
    Route::post('/temperatures', [TemperatureController::class, 'store'])->name('temperatures.store');
    Route::get('/temperatures/{id}/edit', [TemperatureController::class, 'edit'])->name('temperatures.edit');
    Route::put('/temperatures/{id}', [TemperatureController::class, 'update'])->name('temperatures.update');
    Route::delete('/temperatures/{id}', [TemperatureController::class, 'destroy'])->name('temperatures.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
}); 



require __DIR__.'/auth.php';