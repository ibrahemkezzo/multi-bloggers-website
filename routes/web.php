<?php

use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\CategoryController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\ProfileController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class,'index'])->name('home');
// Route::resource('categories',CategoryController::class);
// Route::resource('bloges',BlogController::class);


Route::get('/blogs',[BlogController::class,'index'])->name('blogs.index');
Route::get('/blogs-user',[BlogController::class,'blogsUser'])->name('blogs.user');
Route::get('/blog-show/{blog}',[BlogController::class,'show'])->name('blogs.show');
Route::get('/blog-new',[BlogController::class,'create'])->name('blogs.create')->middleware('auth');
Route::post('/blog-new',[BlogController::class,'store'])->name('blogs.store')->middleware('auth');
Route::get('/blog-edit/{blog}',[BlogController::class,'edit'])->name('blogs.edit')->middleware('auth');
Route::put('/blog-edit/{blog}',[BlogController::class,'update'])->name('blogs.update')->middleware('auth');
Route::post('/blog-destroy/{blog}',[BlogController::class,'destroy'])->name('blogs.destroy')->middleware('auth');


Route::get('/categories',[CategoryController::class,'index'])->name('categories.index');
Route::get('/categories-show/{category}',[CategoryController::class,'show'])->name('categories.show');
Route::get('/category-new',[CategoryController::class,'create'])->name('categories.create')->middleware('auth');
Route::post('/category-new',[CategoryController::class,'store'])->name('categories.store')->middleware('auth');
Route::get('/category-edit/{category}',[CategoryController::class,'edit'])->name('categories.edit')->middleware('auth');
Route::put('/category-edit/{category}',[CategoryController::class,'update'])->name('categories.update')->middleware('auth');
Route::post('/category-destroy/{category}',[CategoryController::class,'destroy'])->name('categories.destroy')->middleware('auth');

// Contact
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Admin Contact Management
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/contacts', [ContactController::class, 'index'])->name('contact.index');
    Route::delete('/admin/contacts/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');
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
