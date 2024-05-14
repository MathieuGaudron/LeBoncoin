<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AnnonceController;
use Illuminate\Support\Facades\Route;
use App\Models\Annonce;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[IndexController::class,"showIndex"]);

// Route::get('/annonce',function(){
//     return view('annonce');
// });

Route::get('/annonce', [AnnonceController::class, 'showAnnonce'])->name('annonce.showAnnonce');
Route::post('/annonce', [AnnonceController::class, 'saveAnnonce'])->name('annonce.saveAnnonce');
Route::get('/modifannonce/{id}', [AnnonceController::class, 'modifAnnonce']);
Route::post('/modifannonce/{id}', [AnnonceController::class, 'modifierAnnonce']);
Route::get('/liste', [AnnonceController::class, 'listAnnonce'])->name('liste.listAnnonce');
Route::get('/liste/{id}',[AnnonceController::class, 'deleteAnnonce']);
Route::get('/search',[AnnonceController::class, 'searchAnnonce']);




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
