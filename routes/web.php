<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TypeEventController;
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
Route::get('/type-events/index', [TypeEventController::class, 'index'])->name('type_events.index');
// Store the newly created TypeEvent
Route::post('/type_events', [TypeEventController::class, 'store'])->name('type_events.store');

// Display a specific TypeEvent by ID
Route::get('/type_events/{id}', [TypeEventController::class, 'show'])->name('type_events.show');

// Show the form for editing a specific TypeEvent by ID
Route::get('/type_events/{id}/edit', [TypeEventController::class, 'edit'])->name('type_events.edit');

// Update a specific TypeEvent by ID
Route::put('/type_events/{id}', [TypeEventController::class, 'update'])->name('type_events.update');

// Delete a specific TypeEvent by ID
Route::delete('/type_events/{id}', [TypeEventController::class, 'destroy'])->name('type_events.destroy');

// events routes ***************************************
Route::resource('/events', EventController::class);
// // Show the form for creating a new Event
// Route::get('/events/create', [EventController::class, 'create'])->name('events.create'); 
// Route::get('/events/index', [EventController::class, 'index'])->name('events.index');
// // Store the newly created Event
// Route::post('/events', [EventController::class, 'store'])->name('events.store');
// // Display a specific Event by ID
// Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');
// // Show the form for editing a specific Event by ID
// Route::get('/events/{id}/edit', [EventController::class, 'edit'])->name('events.edit');
// // Update a specific Event by ID
// Route::put('/events/{id}', [EventController::class, 'update'])->name('events.update');
// // Delete a specific Event by ID
// Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('events.destroy');



Route::resource('/formations', FormationController::class);
Route::post('/formations/store', [FormationController::class, 'store'])->name('formations.store');
Route::get('/formations', [FormationController::class, 'index'])->name('formations.index');
Route::get('/Nosformations', [FormationController::class, 'frontindex'])->name('formations.frontindex');
Route::post('/formations', [FormationController::class, 'store'])->name('formations.store');
Route::get('/formations/{id}', [FormationController::class, 'show'])->name('formations.show');
Route::get('/formations/{id}/edit', [FormationController::class, 'edit'])->name('formations.edit');
Route::put('/formations/{id}', [FormationController::class, 'update'])->name('formations.update');
Route::delete('/formations/{id}', [FormationController::class, 'destroy'])->name('formations.destroy'); 
