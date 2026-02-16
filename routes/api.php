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

// Rutas de autenticación
Route::post('/register', [AuthController::class, 'register'])
    ->middleware('guest')
    ->name('register');


//proteccion para ver estudiantes
Route::middleware([IsUserAuth::class])->group(function () {
    Route::get('/students', [StudentController::class, 'index']);
});

// Rutas del CRUD de estudiantes
// Route::get('/students', [StudentController::class, 'index']);
Route::post('/students', [StudentController::class, 'store']);
Route::get('/students/{id}', [StudentController::class, 'show']);
Route::put('/students/{id}', [StudentController::class, 'update']);
Route::patch('/students/{id}', [StudentController::class, 'updatePartial']);
Route::delete('/students/{id}', [StudentController::class, 'destroy']);

// Ruta protegida para obtener datos del usuario autenticado
Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
