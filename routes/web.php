<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::get('/login', [SessionController::class, 'create'])->name("login");
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);

Route::get('/dashboard', function () {
    return view("dashboard");
})->middleware("auth");

Route::middleware('auth')->group(function () {

    // Services
    Route::get('/dashboard/services', [ServiceController::class, 'index']);
    Route::get('/dashboard/services/create', [ServiceController::class, 'create']);
    Route::post('/services', [ServiceController::class, 'store']);
    Route::get('/dashboard/services/{service}/edit', [ServiceController::class, 'edit']);
    Route::put('/dashboard/services/{service}', [ServiceController::class, 'update']);
    Route::delete('/services/{service}', [ServiceController::class, 'destroy']);
    Route::get('/services/search', [ServiceController::class, 'search']);


    // Clients
    Route::get('/dashboard/clients', [ClientController::class, 'index']);
    Route::get('/dashboard/clients/create', [ClientController::class, 'create']);
    Route::get('/dashboard/clients/{client}', [ClientController::class, 'show']);
    Route::get('/dashboard/clients/{client}/edit', [ClientController::class, 'edit']);
    Route::post('/clients', [ClientController::class, 'store']);
    Route::put('/dashboard/clients/{client}', [ClientController::class, 'update']);
    Route::delete('/clients/{client}', [ClientController::class, 'destroy']);
    Route::get('/clients/search', [ClientController::class, 'search']);

    // Invoices
    Route::get('/dashboard/invoices', [InvoiceController::class, 'index']);
    Route::get('/dashboard/invoices/create', [InvoiceController::class, 'create']);
    Route::get('/dashboard/invoices/{invoice}', [InvoiceController::class, 'show']);
    Route::post('/invoices', [InvoiceController::class, 'store']);
    Route::post('/invoices/get-pdf/{invoice}', [InvoiceController::class, 'downloadPDF']);
    Route::get('/invoices/search', [InvoiceController::class, 'search']);

    // Company
    Route::get('/dashboard/company/{company}', [CompanyController::class, 'show']);
    Route::get('/dashboard/company/{company}/edit', [CompanyController::class, 'edit']);
    Route::put('/dashboard/company/{company}', [CompanyController::class, 'update']);
});
