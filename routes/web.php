<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReviewController;
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

Route::get('/index', function () {
    return view('.index');
});

Route::get('/registration', function () {
    return view('.registration');
});

Route::get('/provisional', [RegistrationController::class, 'provisional']); 
Route::post('/provisional_store', [RegistrationController::class, 'provisional_store']);
Route::get('/provisional_completed', [RegistrationController::class, 'provisional_completed']); 

Route::get('/definitive', [RegistrationController::class, 'definitive']); 
Route::post('/definitive_store', [RegistrationController::class, 'definitive_store']);
Route::get('/definitive_completed', [RegistrationController::class, 'definitive_completed']); 

Route::get('/my_page',[UserController::class, 'my_page']);
Route::get('/my_credits',[UserController::class, 'my_credits']);
Route::get('/logout_check', function(){
    return view('logoutCheck'); 
});


Route::get('/review/{subject}',[ReviewController::class, 'review']);
Route::post('/review_store',[ReviewController::class, 'review_store']);
Route::get('/review_completed',[ReviewController::class, 'review_completed']);
Route::get('/subject',[ReviewController::class, 'subject']);
Route::get('/subject_review/{subject}',[ReviewController::class, 'subject_review']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/tests', [TestController::class, 'importView']); 
Route::post('postSubject', [TestController::class, 'postSubjectsData'])->name('postSubject'); 
Route::post('postCourse', [TestController::class, 'postCourseCategoriesData'])->name('postCourse'); 

require __DIR__.'/auth.php';
