<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;






Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
    $customers = App\Models\Customer::latest()->paginate(10);    
    return view('dashboard', compact('customers'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('clients', ClientController::class);   
    Route::resource('customers', CustomerController::class);

    // method   //route                            //function        //name of the data insert or update in view is product
    Route::get('/dashboard/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/dashboard/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/dashboard/product', [ProductController::class, 'store'])->name('product.store');
    Route::get('/dashboard/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');    
    Route::put('/dashboard/product/{product}/update', [ProductController::class, 'update'])->name('product.update');    
    Route::delete('/dashboard/product/{product}/destroy', [ProductController::class, 'destroy'])->name('product.destroy'); 
    
});

require __DIR__.'/auth.php';
 


    // method   //route                            //function        //name of the data insert or update in view is product
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');    
    Route::put('/product/{product}/update', [ProductController::class, 'update'])->name('product.update');    
    Route::delete('/product/{product}/destroy', [ProductController::class, 'destroy'])->name('product.destroy'); 
