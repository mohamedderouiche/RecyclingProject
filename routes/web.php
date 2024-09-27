<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TypeEventController;
use App\Http\Controllers\ReclamationController;
use App\Http\Controllers\Type_ReclamationController;
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

require __DIR__.'/auth.php';


Route::get('/home', [HomeController::class,"index"]);

Route::get('/index', [AdminController::class,"index"]);

Route::resource('/type_events', TypeEventController::class);
Route::get('/type-events/create', [TypeEventController::class, 'create'])->name('type_events.create');
Route::get('/reclamations', [ReclamationController::class, 'index'])->name('reclamations.index');
Route::get('/reclamationsadmin', [ReclamationController::class, 'adminIndex'])->name('reclamations.admin_index');
Route::get('/reclamations/create', [ReclamationController::class, 'create'])->name('reclamations.createReclamation');
Route::post('/reclamations', [ReclamationController::class, 'store'])->name('reclamations.store');
Route::put('/reclamations/{id}', [ReclamationController::class, 'update'])->name('reclamations.update');
Route::delete('/reclamations/{id}', [ReclamationController::class, 'destroy'])->name('reclamations.destroy');
Route::get('/typeR', [Type_ReclamationController::class, 'index'])->name('type_reclamations.index');
Route::get('/typeR/create', [Type_ReclamationController::class, 'create'])->name('type_reclamations.create');
Route::delete('/typeR/{id}', [Type_ReclamationController::class, 'destroy'])->name('type_reclamations.destroy');
Route::post('/typeR/create', [Type_ReclamationController::class, 'store'])->name('type_reclamations.store');
Route::put('/typeR/{id}', [Type_ReclamationController::class, 'update'])->name('type_reclamations.update');
