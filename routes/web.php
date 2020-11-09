<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/prisoners', function () {
  return view('prisoners');
})->name('prisoners');


Route::middleware(['auth:sanctum', 'verified'])->get('/administration', function () {
  return view('administration');
})->name('administration');


// Route::middleware(['auth:sanctum', 'verified'])->get('/zin', function () {
//   return view('administration');
// })->name('administration');
