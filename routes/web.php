<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AcceptTermsController;
use App\Http\Controllers\AddPetController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FindPetController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PetsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HowItWorksController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\ProductController;
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

// Routes which needs no authentication
Route::get('/', [HomePageController::class, 'index']);
Route::get("/filter-pets", [FindPetController::class, "findDogs"]);
Route::get("/pet-profile/{id}/{type}", [FindPetController::class, "petProfile"])->name('pet-profile');
Route::get("/conditions", [AcceptTermsController::class, "see_conditions"]);
Route::get("/how-it-works", [HowItWorksController::class, "edit"]);
Route::get("/about-us", [AboutController::class, "index"])->name('about-us');
Route::get("/contact", [ContactController::class, "edit"]);
Route::get("/favourites", [FavouriteController::class, "edit"]);
Route::get("/favourite-products", [ProductController::class, "favouriteProducts"])->name('favourite-products');



// User Level Authentication
Route::middleware('auth')->group(function () {
    Route::get('/products/{product}/add-to-favourites', [ProductController::class, 'addToFavourites'])->name('products.addToFavourites');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/pet-update', [ProfileController::class, 'petUpdate'])->name('profile.pet-update');
    Route::delete('/profile', [ProfileController::class, 'petDelete'])->name('profile.pet-delete');

    Route::get("/settings", [SettingsController::class, "edit"])->name('settings.edit');
    Route::put("/settings", [SettingsController::class, "update"])->name('settings.update');
    Route::delete("/settings", [SettingsController::class, "destroy"])->name('settings.destroy');

    Route::get('/add-pet', [AddPetController::class, "edit"])->name('add-pet.edit');
    Route::post('/add-pet', [AddPetController::class, "store"])->name('add-pet.store');

    Route::get("/logout", [LogoutController::class, "logout"]);
});

// Admin Level Authentication
Route::middleware(['auth', 'auth_admin'])->prefix('/dashboard')->group(function () {
    Route::get('/', [DashboardController::class, "edit"])->name('dashboard');

    Route::get('/users', [UsersController::class, "edit"])->name('user.edit');
    Route::patch('/users', [UsersController::class, "update"])->name('users.update');
    Route::delete('/users', [UsersController::class, "destroy"])->name('users.destroy');

    Route::get('/pets', [PetsController::class, "edit"])->name('pets.edit');
    Route::patch('/pets', [PetsController::class, "update"])->name('pets.update');
    Route::delete('/pets', [PetsController::class, "destroy"])->name('pets.destroy');

    Route::get('/products', [ProductController::class,'index'])->name('dashboard.products.index');
    Route::get('/products/create', [ProductController::class,'create'])->name('dashboard.products.create');
    Route::post('/products/create', [ProductController::class, 'store'])->name('dashboard.products.store');
    Route::get('/products/{product}/edit', [ProductController::class,'edit'])->name('dashboard.products.edit');
    Route::post('/products/{product}/edit', [ProductController::class, 'update'])->name('dashboard.products.update');
    Route::delete('/products/{product}/destroy', [ProductController::class,'destroy'])->name('dashboard.products.destroy');
});

// Route::get('/favourites', function () {
//     return view('pets.favourites');
// });

Route::get('/duke', function () { return view('pets.home-page-pets.duke'); })->name('duke');
Route::get('/milo', function () { return view('pets.home-page-pets.milo'); })->name('milo');
Route::get('/rex', function () { return view('pets.home-page-pets.rex'); })->name('rex');
Route::get('/dollar', function () { return view('pets.home-page-pets.dollar'); })->name('dollar');
Route::get('/leo', function () { return view('pets.home-page-pets.leo'); })->name('leo');


Route::get('/pet-profile', function () {
    return view('pets.pet-profile');
});

Route::post('/send-message/{type}', [UsersController::class, "sendEmail"])->name('send-email');
require __DIR__ . '/auth.php';