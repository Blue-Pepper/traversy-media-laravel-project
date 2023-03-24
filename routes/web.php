<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Barryvdh\Debugbar\Facades\Debugbar as FacadesDebugbar;
use Barryvdh\Debugbar\Twig\Extension\Debug;
use DebugBar\DebugBar;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

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
//All listings
Route::get('/', [ListingController::class, 'index'] );

Route::get('/a', function () {
    return view('welcome');
});

//show create form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

//Store
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');
//edit
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');
//update
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

//delete
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

//manage listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

//single listing
Route::get('/listings/{listing}',[ListingController::class, 'show']);

//show register create form

Route::get('/register', [UserController::class, 'create'])->middleware('guest');

//create new user
Route::post('/users', [UserController::class, 'store'])->middleware('guest');

//logout users
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');


//show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//login users
Route::post('/users/authenticate', [UserController::class, 'authenticate']);



//common resource routes:
// index - show all listings
// show - show single listing
// create - show form to create new listing
// store - store new listing
// edit - show form to edit listing
// update - update listing
// destroy - delete listing
