<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EvenementsController;
use App\Http\Controllers\CategoriesController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'verified','role:organisateur'])->group(function () {
    // Route::get('/dashboard_oper', function () {
    //     return view('dashboard_oper');
    // })->name('dashboard_oper');
   //? Route::get('/addEvent',[EvenementsController::class,"addform"])->name("addform");
    // Route::resource('/Article',ArticleController::class); 

});
Route::get('/addEvent',[EvenementsController::class,"addform"])->name("addform");
Route::get('/categories',[CategoriesController::class,"getCatgs"])->name("getCatgs");
Route::get('/addCatgForm',[CategoriesController::class,"addCatgForm"])->name("addCatgForm");
Route::post('/addCatg',[CategoriesController::class,"addCatg"])->name("addCatg");
require __DIR__.'/auth.php';
