
<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\HorarioController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas de Gestión de Alumnos
Route::resource('alumnos', AlumnoController::class)
    ->middleware('auth');

    // Rutas de Gestión de Docentes
Route::resource('docentes', DocenteController::class)
    ->middleware('auth');

    
// Rutas de Gestión de Materias
Route::resource('materias', MateriaController::class)
    ->middleware('auth');
// Rutas de Horarios y Asignación de Materias
Route::resource('horarios', HorarioController::class)
    ->middleware('auth');
    
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';