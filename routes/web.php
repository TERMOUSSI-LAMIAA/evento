<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EvenementsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\UserController;

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
Route::get('/getAllEvent',[EvenementsController::class,"getAllEvent"])->name("getAllEvent");
Route::get('/getEvents',[EvenementsController::class,"getEvents"])->name("getEvents");
Route::get('/details/{id}',[EvenementsController::class,"getDetails"])->name("details");
Route::get('/addEvent',[EvenementsController::class,"addform"])->name("addform");
Route::get('/categories',[CategoriesController::class,"getCatgs"])->name("getCatgs");
Route::get('/updtFormEvent/{id}',[EvenementsController::class,"updtForm"])->name("updtFormEvent");
Route::get('/addCatgForm',[CategoriesController::class,"addCatgForm"])->name("addCatgForm");
Route::get('/updateCatgForm/{id}',[CategoriesController::class,"updateCatgForm"])->name("updateCatgForm");
Route::get('/getUsers',[UserController::class,"getUsers"])->name("getUsers");
//?
Route::post('/restrictUser/{id}',[UserController::class,"restrictUser"])->name("restrictUser");
//?
Route::post('/addCatg',[CategoriesController::class,"addCatg"])->name("addCatg");
Route::put('/updateCatg',[CategoriesController::class,"updateCatg"])->name("updateCatg");
Route::post('/reserveEvent/{id}',[EvenementsController::class,"reserveEvent"])->name("reserveEvent");
Route::post('/storeEvent',[EvenementsController::class,"addEvent"])->name("storeEvent");
Route::put('/updtEvent',[EvenementsController::class,"updtEvent"])->name("updtEvent");
Route::delete('/deleteEvent/{id}',[EvenementsController::class,"deleteEvent"])->name("deleteEvent");
Route::delete('/deleteCatg/{id}',[CategoriesController::class,"deleteCatg"])->name("deleteCatg");
require __DIR__.'/auth.php';
