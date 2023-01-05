<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController; 
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});



/*Route::get('/posts', function () {
    return view('posts');
})->middleware('auth');*/



Route::get('/dashboard', function () {
    $posts = Post::all();
          return view('dashboard',[
        'posts' => $posts,
      ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    //add a post
    Route::get('/posts', [PostController::class, 'index'])->name('posts');
    Route::post('/add-post', [PostController::class, 'add'])->name('add-post');
});






require __DIR__.'/auth.php';
