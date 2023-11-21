<?php

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
/*
Route::resource('blog', BlogPostController::class)
    ->only(['index', 'store', 'create', 'show', 'edit', 'update', 'destroy']);
*/
Route::get('/', function () {
    return view('welcome');
});

//add a route to show all blog posts
Route::get('/blog', [\App\Http\Controllers\BlogPostController::class, 'index'])->name('blog.index');
//add a route to show a single blog post
Route::get('/blog/{postId}', [\App\Http\Controllers\BlogPostController::class, 'show'])->name('blog.show');
//add a route to create a blog post
Route::get('/blog/create/post', [\App\Http\Controllers\BlogPostController::class, 'create'])->name('blog.create');
//add a route to store a blog post
Route::post('/blog/create/post', [\App\Http\Controllers\BlogPostController::class, 'store'])->name('blog.store');
//add a route to edit a blog post
Route::get('/blog/{postId}/edit', [\App\Http\Controllers\BlogPostController::class, 'edit'])->name('blog.edit');
//add a route to update a blog post
Route::put('/blog/{postId}/edit', [\App\Http\Controllers\BlogPostController::class, 'update'])->name('blog.update');
//add a route to delete a blog post
Route::delete('/blog/{postId}/delete', [\App\Http\Controllers\BlogPostController::class, 'destroy'])->name('blog.destroy');
//Route::resource('blog', \App\Http\Controllers\BlogPostController::class) ->only(['destroy']);
//add a route to a comment view
Route::get('/comments/{postId}', [\App\Http\Controllers\BlogCommentsController::class, 'create'])->name('comments.create');
//add comment route
Route::post('/comments/{postId}', [\App\Http\Controllers\BlogCommentsController::class, 'store'])->name('comments.store');

require __DIR__.'/auth.php';
