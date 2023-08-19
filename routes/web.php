<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

//Home
Route::get("/", [HomeController::class,"index"]);
Route::get("/redirects", [HomeController::class,"redirects"]);

//User
Route::get("/users", [AdminController::class,"users"]);
Route::get("/deleteusers/{id}", [AdminController::class,"deleteusers"]);

//Food Menu
Route::get("/foodmenu", [AdminController::class,"foodmenu"]);
Route::post("/uploadfood", [AdminController::class,"upload"]);
Route::get("/deletemenu/{id}", [AdminController::class,"deletemenu"]);
Route::get("/updateview/{id}", [AdminController::class,"updateview"]);
Route::post("/update/{id}", [AdminController::class,"updatefood"]);

//Reservation
Route::get("/viewreservation", [AdminController::class,"viewreservation"]);
Route::post("/reservation", [AdminController::class,"reservation"]);


//Chef
Route::get("/chef", [AdminController::class,"chef"]);
Route::post("/uploadchef", [AdminController::class,"uploadchef"]);
Route::get("/updatechef/{id}", [AdminController::class,"updatechef"]);
Route::post("/updatefoodchef/{id}", [AdminController::class,"updatefoodchef"]);
Route::get("/deletechef/{id}", [AdminController::class,"deletechef"]);

// Add to Cart

Route::get("/details/{id}", [HomeController::class,"details"]);
Route::get("/showcart/{id}", [HomeController::class,"showcart"]);
Route::get("/remove/{id}", [HomeController::class,"remove"]);

// Order
Route::post("/orderconfirm", [HomeController::class,"orderconfirm"]);
Route::get("/vieworder", [AdminController::class,"vieworder"]);
Route::get("/search", [AdminController::class,"search"]);

Route::post("/applyjob", [HomeController::class,"applyjob"]);

Route::get("/deleteorder/{id}", [AdminController::class,"deleteorder"]);





Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
