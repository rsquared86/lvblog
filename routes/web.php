<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//add a route to show all blog posts
Route::get('/blog', [\App\Http\Controllers\BlogPostController::class, 'index'])->middleware(['auth'])->name('blog.index');
//add a route to show a single blog post
Route::get('/blog/{postId}', [\App\Http\Controllers\BlogPostController::class, 'show'])->middleware(['auth'])->name('blog.show');
//add a route to create a blog post
Route::get('/blog/create/post', [\App\Http\Controllers\BlogPostController::class, 'create'])->middleware(['auth'])->name('blog.create');
//add a route to store a blog post
Route::post('/blog/create/post', [\App\Http\Controllers\BlogPostController::class, 'store'])->middleware(['auth'])->name('blog.store');
//add a route to edit a blog post
Route::get('/blog/{postId}/edit', [\App\Http\Controllers\BlogPostController::class, 'edit'])->middleware(['auth'])->name('blog.edit');
//add a route to update a blog post
Route::put('/blog/{postId}/edit', [\App\Http\Controllers\BlogPostController::class, 'update'])->middleware(['auth'])->name('blog.update');
//add a route to delete a blog post
Route::delete('/blog/{postId}/delete', [\App\Http\Controllers\BlogPostController::class, 'destroy'])->middleware(['auth'])->name('blog.destroy');
//Route::resource('blog', \App\Http\Controllers\BlogPostController::class) ->only(['destroy']);
//add a route to a comment view
Route::get('/comments/{postId}', [\App\Http\Controllers\BlogCommentsController::class, 'create'])->middleware(['auth'])->name('comments.create');
//add comment route
Route::post('/comments/{postId}', [\App\Http\Controllers\BlogCommentsController::class, 'store'])->middleware(['auth'])->name('comments.store');

require __DIR__.'/auth.php';
