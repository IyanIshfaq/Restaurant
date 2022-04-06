<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\view;
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


Route::get("/",[HomeController::class,"index"]);

Route::get("/users",[AdminController::class,"users"]);
Route::get("/deleteuser/{id}",[AdminController::class,"deleteuser"]);
Route::get("/foodmenu",[AdminController::class,"foodmenu"]);
Route::post("/uploadfood",[AdminController::class,"upload"]);
Route::get("/deletefood/{id}",[AdminController::class,"deletefood"]);
Route::get("/updateview/{id}",[AdminController::class,"updateview"]);
Route::post("/update/{id}",[AdminController::class,"update"]);
Route::post("/reservation",[AdminController::class,"reservation"]);
Route::get("/viewreservation",[AdminController::class,"viewreservation"]);
Route::get("/viewchef",[AdminController::class,"viewchef"]);
Route::post("/uploadchef",[AdminController::class,"uploadchef"]);
Route::get("/updatechef/{id}",[AdminController::class,"updatechef"]);
Route::post("/updatefoodchef/{id}",[AdminController::class,"updatefoodchef"]);
Route::get("/deletechef/{id}",[AdminController::class,"deletechef"]);
Route::get("/vieworder",[AdminController::class,"vieworder"]);
Route::get("/search",[AdminController::class,"search"]);






Route::post("/orderconfirm",[HomeController::class,"orderconfirm"]);
Route::get("/remove/{id}",[HomeController::class,"remove"]);
Route::get("/showcart/{id}",[HomeController::class,"showcart"]);
Route::post("/addcart/{id}",[HomeController::class,"addcart"]);
Route::get("/redirect",[HomeController::class,"redirect"]);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
 