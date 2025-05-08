<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PersonajesController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsUserAuth;
use App\Http\Controllers\GameController;

// Rutas de autenticación
// Route::post('/register', [RegisteredUserController::class, 'store'])
//     ->middleware('guest')
//     ->name('register');

// Route::post('/login', [AuthenticatedSessionController::class, 'store'])
//     ->middleware('guest')
//     ->name('login');

//crea una funcion vacia con un mensaje para comprobar la ruta de login
// Route::post('/login', function () {
//     return response()->json(['message' => 'Login route']);
// })->middleware('guest')->name('login');




// Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
//     ->middleware('guest')
//     ->name('password.email');

// Route::post('/reset-password', [NewPasswordController::class, 'store'])
//     ->middleware('guest')
//     ->name('password.store');

// Route::get('/verify-email/{id}/{hash}', VerifyEmailController::class)
//     ->middleware(['auth', 'signed', 'throttle:6,1'])
//     ->name('verification.verify');

// Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
//     ->middleware(['auth', 'throttle:6,1'])
//     ->name('verification.send');

// Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
//     ->middleware('auth')
//     ->name('logout');

// // Rutas del CRUD de estudiantes
// Route::get('/students', [StudentController::class, 'index']);
// Route::post('/students', [StudentController::class, 'store']);
// Route::get('/students/{id}', [StudentController::class, 'show']);
// Route::put('/students/{id}', [StudentController::class, 'update']);
// Route::patch('/students/{id}', [StudentController::class, 'updatePartial']);
// Route::delete('/students/{id}', [StudentController::class, 'destroy']);

// // Ruta protegida para obtener datos del usuario autenticado
// Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//     return $request->user();
// });

//PUBLIC ROUTES
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::get('personajes', [PersonajesController::class, 'getPersonajes']);
Route::get('/personajes/{id}', [PersonajesController::class, 'getPersonaje']);


//PROTECTED ROUTES IS USER AUTH (LOGIN W TOKEN)
Route::middleware([IsUserAuth::class])->group(function () {
    // 🔑 Autenticació
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('me', [AuthController::class, 'getUser']);

    // 🎭 Personatges (afegeix però no modifica ni elimina)
    Route::post('personajes', [PersonajesController::class, 'addPersonaje']);

    // 🧠 Partides
    Route::get('/games', [GameController::class, 'index']);              // Veure les meves partides
    Route::post('/games', [GameController::class, 'store']);             // Crear partida
    Route::put('/games/{game}/finish', [GameController::class, 'update']); // Finalitzar
    Route::get('/ranking', [GameController::class, 'ranking']);          // TOP 5
});


//ADMIN ROUTES
Route::middleware([IsAdmin::class])->group(function () {
    // 👥 Gestió d'usuaris
    Route::get('users', [AuthController::class, 'getUsers']);
    Route::get('/users/{id}', [AuthController::class, 'getUserById']);
    Route::put('/users/{id}', [AuthController::class, 'updateUser']);
    Route::delete('/users/{id}', [AuthController::class, 'deleteUser']);

    // 🎭 CRUD complet de personatges
    Route::post('personajes', [PersonajesController::class, 'addPersonaje']);
    Route::put('/personajes/{id}', [PersonajesController::class, 'updatePersonaje']);
    Route::delete('/personajes/{id}', [PersonajesController::class, 'deletePersonaje']);
});
