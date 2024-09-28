<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TypeEventController;

use App\Http\Controllers\CategoryController;

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

Route::get('/login', function () {
    return view('login');
})->middleware(['auth', 'verified'])->name('login');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

  //**********
    Route::resource('/type_events', TypeEventController::class);
Route::get('/type-events/create', [TypeEventController::class, 'create'])->name('type_events.create');
// home admin
Route::get('/index', [AdminController::class,"index"]);
Route::get('', [AdminController::class,"index"]);
//Category
Route::resource('/categories', CategoryController::class);
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
// Event
Route::get('/type-events', [TypeEventController::class, 'index'])->name('type_events.index');
Route::get('/type-events/card', [TypeEventController::class, 'homeDisplay'])->name('type_events.home');
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
Route::get('/type_events/{id}/events', [EventController::class, 'displayEventByTypeEventId'])
    ->name('type_events.events');
    Route::get('/events/{id}/events', [EventController::class, 'displayEventsByTypeEventId'])
    ->name('events.events');
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

// reclamation
Route::get('/reclamationsadmin', [ReclamationController::class, 'adminIndex'])->name('reclamations.admin_index');

Route::get('/reclamations/create', [ReclamationController::class, 'create'])->name('reclamations.createReclamation');

Route::get('/reclamations', [ReclamationController::class, 'index'])->name('reclamations.index');


Route::post('/reclamations', [ReclamationController::class, 'store'])->name('reclamations.store');
Route::put('/reclamations/{id}', [ReclamationController::class, 'update'])->name('reclamations.update');
Route::delete('/reclamations/{id}', [ReclamationController::class, 'destroy'])->name('reclamations.destroy');
Route::get('/typeR', [Type_ReclamationController::class, 'index'])->name('type_reclamations.index');
Route::get('/typeR/create', [Type_ReclamationController::class, 'create'])->name('type_reclamations.create');
Route::delete('/typeR/{id}', [Type_ReclamationController::class, 'destroy'])->name('type_reclamations.destroy');
Route::post('/typeR/create', [Type_ReclamationController::class, 'store'])->name('type_reclamations.store');
Route::put('/typeR/{id}', [Type_ReclamationController::class, 'update'])->name('type_reclamations.update');

Route::get('/reclamations/{id}', [ReclamationController::class, 'show'])->name('reclamations.show');



});

require __DIR__.'/auth.php';


Route::get('/home', [HomeController::class,"index"]);






