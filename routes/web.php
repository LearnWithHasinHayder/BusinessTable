<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;




Route::view("/","pages.customer");


// Route::post("/create-customer",[CustomerController::class,'CustomerCreate']);
// Route::get("/list-customer/{perPage}/{keyword}",[CustomerController::class,'CustomerList']);
// Route::get("/delete-customer/{id}",[CustomerController::class,'CustomerDelete']);
// Route::post("/update-customer",[CustomerController::class,'CustomerUpdate']);
// Route::post("/customer-by-id",[CustomerController::class,'CustomerByID']);


// Customer Routes
Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
Route::get('/customers/{customer}', [CustomerController::class, 'show'])->name('customers.show');
Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
Route::put('/customers/{customer}', [CustomerController::class, 'update'])->name('customers.update');
Route::delete('/customers/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');
