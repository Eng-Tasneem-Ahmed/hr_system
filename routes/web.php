<?php

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
use Illuminate\Http\Request;

Route::middleware('auth')->get('/', function () {
    // $ipAddress = $request->getClientIp();
    // dd($ipAddress);
    return view('dashboard.index');
})->name('dashboard');

require __DIR__.'/dashboard.php';