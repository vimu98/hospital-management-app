<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get("/", [HomeController::class,"index"]);

Route::get("/add_doctor_view", [AdminController::class,"addview"]);

Route::post("/upload_doctor", [AdminController::class,"upload"]);

Route::post("/appoinment", [HomeController::class,"appoinment"]);

Route::get("/myappoinment", [HomeController::class,"myappoinment"]);

Route::get("/cancal_appoint/{id}", [HomeController::class,"cancal_appoint"]);

Route::get("/showappintment", [AdminController::class,"showappintment"]);

Route::get("/approved/{id}", [AdminController::class,"approved"]);

Route::get("/canceled/{id}", [AdminController::class,"canceled"]);

Route::get("/showdoctors", [AdminController::class,"showdoctors"]);

Route::get("/deletedoctor/{id}", [AdminController::class,"deletedoctor"]);

Route::get("/updatedoctor/{id}", [AdminController::class,"updatedoctor"]);

Route::post("/editdoctor/{id}", [AdminController::class,"editdoctor"]);

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});
 
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'rederect']);
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});